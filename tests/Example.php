<?php
namespace liphte\tests;
use liphte\tags\html\Tag;

class Example {

    public function __construct() {

        $t = new Tag();

        echo $t->table ([ 'style' => 'border: 1px solid #070;' ],
            [
                $t->tr(
                    [
                        $t->td([ 'style' => 'border: 1px solid #000;' ],
                            'Column 1'
                        ),
                        $t->td([ 'style' => 'border: 1px solid #000;' ],
                            'Column 2'
                        )
                    ]
                )
            ]
        );
        echo "\n";
    }

}