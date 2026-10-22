![ Liphte ](http://maveius.pl/img/portfolio/liphte-big.png)
# Liphte

[![Tests](https://github.com/maveius/liphte/actions/workflows/tests.yml/badge.svg?branch=master)](https://github.com/maveius/liphte/actions/workflows/tests.yml)
![PHP](https://img.shields.io/badge/PHP-8.5%2B-777bb4)
![PHPUnit](https://img.shields.io/badge/PHPUnit-12-success)
![Vulnerabilities](https://img.shields.io/badge/vulnerabilities-0%20(composer%20audit)-brightgreen)
![License](https://img.shields.io/badge/license-MIT-blue)

The HTML test report is published as a plain `test-report.html` artifact of each [Tests workflow run](https://github.com/maveius/liphte/actions/workflows/tests.yml). The pipeline also runs `composer audit` and fails on any known vulnerability.

Lightweight & minimalistic HTML Builder/Generator (or maybe Template Engine) for PHP

## What is liphte ?
It's lightweight and minimalistic wrapper of html or dom builder based on [windwalker-dom](https://github.com/ventoviro/windwalker-dom) and [windwalker-html](https://github.com/ventoviro/windwalker-html), but inspired by projects [rudykocur/pyeve](https://github.com/rudykocur/pyeve) and [rudykocur/breve](https://github.com/rudykocur/breve) which is simplest way to create or generate html from controllers or others php files. 

#### Example:
```php
/** Import **/
use liphte\tags\html\Tag;
use liphte\tags\html\Attribute as a;

/** In your code (for example controller) **/
  $t = Liphte::tag();

  $result = $t->table ([ 'style' => 'border: 1px solid #070;' ],
      [
          $t->tr(
              [
                  $t->td( a::style( 'border: 1px solid #000;' ),
                      'Column 1'
                  ),
                  $t->td( a::style( 'border: 1px solid #000;' ),
                      'Column 2'
                  )
              ]
          )
      ]
  );
  echo $result . "\n";
```

#### Output:
```html
<table style="border: 1px solid #070;"><tr><td style="border: 1px solid #000;">Column 1</td><td style="border: 1px solid #000;">Column 2</td></tr></table>
```

## Installing Liphte

#### Composer required:
```php
{
    "require": {
        "maveius/liphte": "^2.0"
    }
}
```
or
```php
{
    "require": {
        "maveius/liphte": "dev-master"
    }
}
```

1. Add required package to `composer.json`
2. Run `composer update` in your project directory.
3. Enjoy! Import library and use like in example. 

## Requirements:

- PHP >= 8.5
- `windwalker/dom` ^3.5 (last release line with the `HtmlElement` API; 4.x escapes nested HTML, so it is not a drop-in)

## Changelog

- v2.0 :
	- Requires PHP 8.5, PHPUnit 12; sources moved to `src/` (PSR-4), `Attributes` moved to `liphte\tags\html`
	- Fixed `TypeError` in `Tag` on PHP 8 (`method_exists()` with an array)
	- Dropped unused `windwalker/html`; added CI pipeline, `composer audit` and HTML test report

- v1.0 : 10 June 2015:
	- Refactoring code and direcotries structure

- v0.1 : 6 June 2015:
	- Init repository & implement first concept.

## Main Developers

- [maveius](http://maveius.pl)

## Licence
- MIT

## Home Page
- [http://maveius.pl/liphte](http://maveius.pl/liphte)
