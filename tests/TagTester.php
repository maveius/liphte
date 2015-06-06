<?php
namespace liphte\tests;
use liphte\html\tags\Tag;

class TagTester {

    public function __construct() {

        $T = new Tag();

        echo $T->table (
            [ 'style' => 'border: 1px solid #070;' ],
            [
                $T->tr(
                    [],
                    [
                        $T->td(
                            [ 'style' => 'border: 1px solid #000;' ],
                            'Kolumna 1'
                        ),
                        $T->td(
                            [ 'style' => 'border: 1px solid #000;' ],
                            'Kolumna 2'
                        )
                    ]
                )
            ]
        );
    }

}