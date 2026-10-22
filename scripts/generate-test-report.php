<?php
declare(strict_types=1);

// Renders a self-contained HTML report (archivolt look) from PHPUnit's JUnit XML log.
// Usage: php scripts/generate-test-report.php <junit.xml> <output.html>

[$script, $input, $output] = $argv + [null, 'test-results/junit.xml', 'tests/reports/test-report.html'];

if (!is_file($input)) {
    fwrite(STDERR, "JUnit log not found: $input\n");
    exit(1);
}

const COLOUR = ['passed' => '#3fb950', 'failed' => '#f85149', 'skipped' => '#d29922'];
const STATUSES = ['passed', 'failed', 'skipped'];

function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE);
}

function pct(int|float $part, int|float $whole): string
{
    return $whole > 0 ? number_format($part / $whole * 100, 1) . '%' : '—';
}

function duration(float $seconds): string
{
    return $seconds < 1 ? round($seconds * 1000) . ' ms' : number_format($seconds, 2) . ' s';
}

function emptyCounts(): array
{
    return ['passed' => 0, 'failed' => 0, 'skipped' => 0, 'total' => 0, 'time' => 0.0];
}

function resultBar(array $counts): string
{
    $segments = '';
    foreach (STATUSES as $status) {
        if ($counts[$status] > 0) {
            $segments .= sprintf('<span style="flex:%d;background:%s" title="%s: %d"></span>', $counts[$status], COLOUR[$status], $status, $counts[$status]);
        }
    }

    return "<div class=\"result-bar\">$segments</div>";
}

/** @param array<string,array{label:string,colour:string,value:int}> $slices */
function donut(string $title, array $slices, string $centerValue, string $centerCaption): string
{
    $total = array_sum(array_column($slices, 'value'));
    $arcs = '';
    $legend = '';
    $before = 0.0;
    foreach ($slices as $slice) {
        $percent = $total > 0 ? $slice['value'] / $total * 100 : 0;
        if ($slice['value'] > 0) {
            $arcs .= sprintf(
                '<circle r="15.9155" cx="21" cy="21" fill="none" stroke="%s" stroke-width="5" stroke-dasharray="%.3f %.3f" stroke-dashoffset="%.3f"><title>%s: %d</title></circle>',
                $slice['colour'], $percent, 100 - $percent, 25 - $before, $slice['label'], $slice['value']
            );
        }
        $before += $percent;
        $legend .= sprintf('<li><i style="background:%s"></i><b>%s</b> %s<small>%d</small></li>', $slice['colour'], pct($slice['value'], $total), $slice['label'], $slice['value']);
    }

    return sprintf(
        '<figure class="donut"><figcaption class="kpi-label">%1$s</figcaption><svg viewBox="0 0 42 42" role="img" aria-label="%1$s"><circle r="15.9155" cx="21" cy="21" fill="none" stroke="#ffffff10" stroke-width="5"></circle>%2$s<text x="21" y="21.5" class="donut-value">%3$s</text><text x="21" y="26.5" class="donut-caption">%4$s</text></svg><ul>%5$s</ul></figure>',
        $title, $arcs, $centerValue, $centerCaption, $legend
    );
}

$xml = simplexml_load_file($input);
$cases = [];
foreach ($xml->xpath('//testcase') as $case) {
    $status = 'passed';
    $message = '';
    foreach (['failure' => 'failed', 'error' => 'failed', 'skipped' => 'skipped'] as $tag => $mapped) {
        if (isset($case->{$tag})) {
            $status = $mapped;
            $message = trim((string) $case->{$tag});
        }
    }
    $cases[] = [
        'class' => (string) $case['class'],
        'name' => (string) $case['name'],
        'file' => (string) $case['file'],
        'time' => (float) $case['time'],
        'status' => $status,
        'message' => $message,
    ];
}

$totals = emptyCounts();
$classes = [];
foreach ($cases as $c) {
    $classes[$c['class']] ??= emptyCounts();
    foreach ([&$totals, &$classes[$c['class']]] as &$bucket) {
        $bucket[$c['status']]++;
        $bucket['total']++;
        $bucket['time'] += $c['time'];
    }
    unset($bucket);
}
ksort($classes);

$classesFailing = count(array_filter($classes, fn ($k) => $k['failed'] > 0));
$classRows = '';
foreach ($classes as $name => $k) {
    $classRows .= sprintf(
        '<tr><td>%s</td><td class="number">%d</td><td class="number">%s</td><td>%s</td><td class="number">%s</td></tr>',
        e($name), $k['total'], pct($k['passed'], $k['total']), resultBar($k), duration($k['time'])
    );
}

$failing = array_values(array_filter($cases, fn ($c) => $c['status'] === 'failed'));
$failingRows = '';
foreach ($failing as $i => $c) {
    $failingRows .= sprintf(
        '<tr><td class="number muted">%d</td><td>%s::%s<div class="error mono">%s</div></td><td class="number">%s</td></tr>',
        $i + 1, e($c['class']), e($c['name']), e($c['message']), duration($c['time'])
    );
}
$failingPanel = $failing
    ? sprintf('<section class="panel" style="border-color:%1$s66"><h2 style="color:%1$s">Failing tests <small>%2$d</small></h2><table><tbody>%3$s</tbody></table></section>', COLOUR['failed'], count($failing), $failingRows)
    : '';

$slowest = $cases;
usort($slowest, fn ($a, $b) => $b['time'] <=> $a['time']);
$slowestRows = '';
foreach (array_slice($slowest, 0, 10) as $i => $c) {
    $slowestRows .= sprintf('<tr><td class="number muted">%d</td><td>%s::%s</td><td class="number">%s</td></tr>', $i + 1, e($c['class']), e($c['name']), duration($c['time']));
}

$kpis = '';
foreach ([
    ['TEST CLASSES', count($classes), ''],
    ['PASS RATE', pct($totals['passed'], $totals['total']), ''],
    ['TESTS', $totals['total'], ''],
    ['FAILING NOW', $totals['failed'], $totals['failed'] ? COLOUR['failed'] : ''],
    ['DURATION', duration($totals['time']), ''],
] as [$label, $value, $colour]) {
    $kpis .= sprintf('<div><div class="kpi-label">%s</div><div class="kpi-value"%s>%s</div></div>', $label, $colour ? " style=\"color:$colour\"" : '', $value);
}

$counters = '';
foreach (STATUSES as $status) {
    $counters .= sprintf(
        '<div class="counter"><span class="kpi-label">%s</span><b style="color:%s">%d</b><small>%s</small></div>',
        strtoupper($status), COLOUR[$status], $totals[$status], pct($totals[$status], $totals['total'])
    );
}
$counters .= sprintf('<div class="counter"><span class="kpi-label">AVG TEST</span><b>%s</b></div>', duration($totals['total'] ? $totals['time'] / $totals['total'] : 0));

$testSlices = [];
foreach (STATUSES as $status) {
    $testSlices[$status] = ['label' => strtoupper($status), 'colour' => COLOUR[$status], 'value' => $totals[$status]];
}
$classSlices = [
    'passing' => ['label' => 'PASSING', 'colour' => COLOUR['passed'], 'value' => count($classes) - $classesFailing],
    'failing' => ['label' => 'FAILING', 'colour' => COLOUR['failed'], 'value' => $classesFailing],
];
$testDonut = donut('TESTS', $testSlices, pct($totals['passed'], $totals['total']), 'PASSED');
$classDonut = donut('TEST CLASSES', $classSlices, pct(count($classes) - $classesFailing, count($classes)), 'PASSING');

$bar = resultBar($totals);
$classCount = count($classes);
$commit = getenv('GITHUB_SHA') ? substr(getenv('GITHUB_SHA'), 0, 7) : 'local';
$branch = getenv('GITHUB_REF_NAME') ?: 'local';
$generated = gmdate('Y-m-d H:i') . ' UTC';
$phpVersion = PHP_VERSION;

$styles = <<<'CSS'
*{box-sizing:border-box}
body{margin:0;color:#e6edf3;font:14px/1.5 Inter,ui-sans-serif,system-ui,sans-serif;background-color:#0d0d0f;background-image:linear-gradient(#ffffff08 1px,transparent 1px),linear-gradient(90deg,#ffffff08 1px,transparent 1px);background-size:48px 48px}
.mono,.kpi-label,.badge,.kpi-value,.topbar,small,td.number{font-family:"JetBrains Mono","SF Mono",ui-monospace,Menlo,monospace}
.topbar{display:flex;justify-content:space-between;align-items:center;padding:14px 72px;border-bottom:1px solid #ffffff12;font-size:13px}
.brand::before,.pill i{content:"";display:inline-block;width:8px;height:8px;border-radius:50%;background:#c2651a;margin-right:8px}
.pill{border:1px solid #30363d;border-radius:6px;padding:5px 10px;background:#16161a;color:#c9d1d9;font-size:12px}
main{max-width:1180px;margin:0 auto;padding:36px 24px 60px}
h1{margin:0;font-size:22px;font-weight:600}.subtitle{color:#8b949e;margin:4px 0 0}
.kpis,.panel{background:#151518;border:1px solid #2a2a30;border-radius:10px}
.kpis{display:grid;grid-template-columns:repeat(5,1fr);gap:16px;padding:18px 20px;margin:22px 0}
.kpi-label{font-size:10px;letter-spacing:.08em;color:#8b949e}.kpi-value{font-size:20px;margin-top:2px}
.panel{padding:16px 18px;margin-top:16px}.panel h2{margin:0 0 12px;font-size:14px;font-weight:600}.panel h2 small{color:#8b949e;font-weight:400;margin-left:6px}
.grid-two{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.counters{display:grid;grid-template-columns:repeat(2,1fr);gap:16px;margin-bottom:14px}.counter b{display:block;font-size:20px;font-weight:500;font-family:"JetBrains Mono",ui-monospace,monospace}.counter small{color:#8b949e}
.result-bar{display:flex;height:8px;border-radius:4px;overflow:hidden;background:#ffffff0a;gap:2px;min-width:160px}
.scroll{max-height:520px;overflow:auto}
.latest{display:grid;grid-template-columns:230px 230px 1fr;gap:24px;align-items:start}
.donut{margin:0;text-align:center}.donut svg{width:150px;height:150px;display:block;margin:8px auto}
.donut-value{font:600 6.5px "JetBrains Mono",ui-monospace,monospace;fill:#e6edf3;text-anchor:middle}.donut-caption{font:3px "JetBrains Mono",ui-monospace,monospace;fill:#8b949e;text-anchor:middle;letter-spacing:.1em}
.donut ul{list-style:none;margin:0;padding:0;text-align:left;font-size:12px}.donut li{display:flex;align-items:center;gap:8px;padding:2px 0}.donut li i{width:9px;height:9px;border-radius:2px}.donut li b{font-family:"JetBrains Mono",ui-monospace,monospace;min-width:52px}.donut li small{margin-left:auto;color:#8b949e}
table{width:100%;border-collapse:collapse}th{position:sticky;top:0;background:#151518;text-align:left;font-size:10px;letter-spacing:.08em;color:#8b949e;font-weight:500;padding:8px;border-bottom:1px solid #2a2a30;text-transform:uppercase}
td{padding:7px 8px;border-bottom:1px solid #ffffff0d;vertical-align:middle}th.number,td.number{text-align:right;white-space:nowrap}th.wide{width:36%}
.muted{color:#6e7681}.mono{font-size:11px}.error{color:#e5534b;white-space:pre-wrap;word-break:break-word}
@media (max-width:900px){.grid-two,.latest{grid-template-columns:1fr}.kpis{grid-template-columns:repeat(2,1fr)}.topbar{padding:14px 20px}}
CSS;

$html = <<<HTML
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>liphte test report</title><style>$styles</style></head><body>
<div class="topbar"><span class="brand">maveius / liphte</span><span class="pill"><i></i>PHP $phpVersion · PHPUnit</span></div>
<main>
<h1>Test report</h1><p class="subtitle">Branch $branch · commit $commit · $generated</p>
<section class="kpis">$kpis</section>
<section class="panel"><h2>Latest run</h2><div class="latest">$testDonut$classDonut<div><div class="counters">$counters</div>$bar</div></div></section>
<section class="panel"><h2>Test classes <small>$classCount</small></h2><div class="scroll"><table><thead><tr><th>Class</th><th class="number">Tests</th><th class="number">Pass</th><th class="wide">Results</th><th class="number">Time</th></tr></thead><tbody>$classRows</tbody></table></div></section>
$failingPanel
<section class="panel"><h2>Slowest tests <small>10</small></h2><table><tbody>$slowestRows</tbody></table></section>
</main></body></html>
HTML;

@mkdir(dirname($output), 0777, true);
file_put_contents($output, $html);
echo "Report written to $output ({$totals['total']} tests, {$totals['failed']} failed)\n";
