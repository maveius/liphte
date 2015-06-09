<?php


namespace liphte\tests;

use liphte\tags\html\Tag;
use PHPUnit_Framework_TestCase;

class TagTest extends PHPUnit_Framework_TestCase {

    function testBasicDomTags() {
        $t = new Tag();
        $actual = $t->html(
            [
                $t->head(''),
                $t->body(
                    [
                        $t->header(
                            $t->h1('header')
                        ),
                        $t->div(['class'=>'content'],
                            'inside content'
                        )
                    ]
                )
            ]
        );

        $expected = '<html><head></head><body><header><h1>header</h1>'
            .'</header><div class="content">inside content</div></body></html>';

        $this->assertEquals($expected, $actual);
    }

    function testBasicDomAttributesTags() {

        $t = new Tag();
        $actual = $t->html(
            [
                $t->head(''),
                $t->body(['class'=>"container"],
                    [
                        $t->header(['style' => 'width: 1px solid #000;', 'id'=>'my-header'],
                            $t->h1('header')
                        ),
                        $t->div(['class'=>'content'],
                                'inside content'
                        )
                    ]
                )
            ]
        );

        $expected = '<html><head></head><body class="container"><header style="width: 1px solid #000;"'.
            ' id="my-header"><h1>header</h1></header><div class="content">inside content</div></body></html>';

        $this->assertEquals($expected, $actual);
    }
}
