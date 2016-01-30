<?php


namespace liphte\tests;

use liphte\tags\html\Attribute as a;
use liphte\tags\html\Tag as T;
use Panel;
use PHPUnit_Framework_TestCase;

class TagTest
    extends PHPUnit_Framework_TestCase
{

    function testBasicDomTags()
    {


        $actual = T::html(
            [
                T::head(),
                T::body(
                    [
                        T::header(
                            T::h1( 'header' )
                        ),
                        T::div( [ 'class' => 'content' ],
                            'inside content'
                        )
                    ]
                )
            ]
        );

        $expected = '<html><head></head><body><header><h1>header</h1>'
            . '</header><div class="content">inside content</div></body></html>';

        $this->assertEquals( $expected, $actual );
    }

    function testBasicDomAttributesTags()
    {


        $actual = T::html(
            [
                T::head( '' ),
                T::body( [ 'class' => "container" ],
                    [
                        T::header( [ 'style' => 'width: 1px solid #000;', 'id' => 'my-header' ],
                            T::h1( 'header' )
                        ),
                        T::div( [ 'class' => 'content' ],
                            'inside content'
                        )
                    ]
                )
            ]
        );

        $expected = '<html><head></head><body class="container"><header style="width: 1px solid #000;"' .
            ' id="my-header"><h1>header</h1></header><div class="content">inside content</div></body></html>';

        $this->assertEquals( $expected, $actual );
    }

    function testMixedTags()
    {

        $actual = T::html(
            [
                T::head(),
                T::body( a::c1ass( 'container' ),
                    [
                        T::header( ['style' => 'width: 1px solid #000;'], a::id( 'my-header' ),
                            T::h1( 'header' )
                        ),
                        T::div( a::c1ass('content'),
                            'inside content'
                        )
                    ]
                ),
            ]
        );

        $expected = '<html><head></head><body class="container"><header style="width: 1px solid #000;"' .
            ' id="my-header"><h1>header</h1></header><div class="content">inside content</div></body></html>';

        $this->assertEquals( $expected, $actual );
    }


    function testRenderableTags()
    {

        $actual = T::html(
            [
                T::head(),
                T::body( a::c1ass( 'container' ),
                    [
                        T::header( ['style' => 'width: 1px solid #000;'], a::id( 'my-header' ),
                            T::h1( 'header' )
                        ),
                        new Panel('Test', 'inside content')
                    ]
                ),
            ]
        );

        $expected = '<html><head></head><body class="container"><header style="width: 1px solid #000;"' .
            ' id="my-header"><h1>header</h1></header><div class="panel panel-default"><div class="panel-heading">' .
            '<h3 class="panel-title">Test</h3></div><div class="panel-body">inside content</div></div></body></html>';

        $this->assertEquals( $expected, $actual );
    }

    function testRenderableOuterTags()
    {

        $actual = T::html(
            [
                T::head(),
                T::body( a::c1ass( 'container' ),
                    [
                        T::header( ['style' => 'width: 1px solid #000;'], a::id( 'my-header' ),
                            T::h1( 'header' )
                        )
                    ],
                    new Panel('Test', 'inside content')
                ),
            ]
        );

        $expected = '<html><head></head><body class="container"><header style="width: 1px solid #000;"' .
            ' id="my-header"><h1>header</h1></header><div class="panel panel-default"><div class="panel-heading">' .
            '<h3 class="panel-title">Test</h3></div><div class="panel-body">inside content</div></div></body></html>';

        $this->assertEquals( $expected, $actual );
    }
}
