<?php
namespace liphte\tests;
use liphte\tags\components\Renderable;
use liphte\tags\html\Attribute as a;
use liphte\tags\html\Attribute;
use liphte\tags\html\Tag as T;
use Panel;
use Windwalker\Dom\DomElements;

class Example {

    public function __construct()
    {

        
//        echo "\n" . T::table( a::style('border: 1px solid #070;'),
//            [
//                T::tr(
//                    [
//                        T::td( a::style('border: 1px solid #000;' ),
//                            'Column 1'
//                        ),
//                        T::td( a::style( 'border: 1px solid #000;' ),
//                            'Column 2'
//                        )
//                    ]
//                )
//            ]
//        );
        $this->template();
//        $this->index();

//        $this->comments();
//        $this->needing();
    }

    public function template()
    {

        echo "\n";

        T::span( a::ariaChecked('false') );

        echo T::div( a::id('main'),
            [
                T::h1( ['class' => 'test'], 'text' ),
                T::h2( '{{title}}' ),
                T::div( a::id('body'), a::c1ass('body', 'container'),
                    '{{body}}'
                )
            ],
            new Panel( 'Test' , 'This is a test panel')
        );
        echo "\n\n";
    }

    public function index()
    {

        echo "\n";
        echo "\n";

        echo T::doctype(
            T::html(['ng-app' => 'nameApp'],
                [
                    T::head(
                        [
                            T::meta(['charset' => 'utf-8']),
                            T::title('Angular.js Example'),
                            T::script(
                                ['src' => 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular.min.js']
                            ),
                            T::script(
                                [
                                    ' var nameApp = angular.module(\'nameApp\', []);
                                nameApp.controller(\'NameCtrl\', function( $scope ) {
                                    $scope.names = [\'Lary\', \'Curly\', \'Moe\'];
                                    $scope.addName = function () {
                                        $scope.names.push($scope.enteredName);
                                    }
                                    //$scope.firstName = \'John\';
                                    //
                                    //$scope.$watch(\'lastName\', function(newValue, oldValue) {
                                    //    console.log(\'new value is \' + newValue);
                                    //});
                                    //
                                    //setTimeout(function(){
                                    //    $scope.lastName = \'Smith\';
                                    //    $scope.$apply();
                                    //}, 1000);
                                });'
                                ]
                            )
                        ]
                    ),
                    T::body(['ng-controller' => 'NameCtrl'],
                        [
                            T::ul(
                                [
                                    T::li(['ng-repeat' => 'name in names track by $index'],
                                        [
                                            '{{name}}'
                                        ]
                                    )
                                ]
                            ),
                            T::form(['ng-submit' => 'addName()'],
                                [
                                    T::input(['type' => 'text', 'ng-model' => 'enteredName']),
                                    T::input(['type' => 'submit', 'value' => 'add'])
                                ]
                            )
                            //'Frist name:' . T::input( ['ng-model'=>'firstName', 'type'=>'text'] ),
                            //T::br(),
                            //'Last name:' . T::input( ['ng-model'=>'lastName', 'type'=>'text'] ),
                            //T::br(),
                            //'Hello {{firstName}} {{lastName}}'

                        ]
                    )
                ]
            )
        );
        echo "\n";
    }

    private function comments()
    {
        echo "\n";

        $comment = "!--";
        echo (string) new DomElements(
            [
                T::$comment("HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries"),
                T::$comment("WARNING: Respond.js doesn't work if you view the page via file://"),
                T::$comment(
                    [
                        '[if lt IE 9]',
                        T::script(a::src("https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js")),
                        T::script(a::src("https://oss.maxcdn.com/respond/1.4.2/respond.min.js")),
                        '[endif]'
                    ]
                )
            ]
        );

        echo "\n";
    }

    private function needing() {


// CASE 1
        /** @noinspection PhpUndefinedClassInspection */
        /** @method div( assoc_array $htmlAttributes, string $content ) */
        /** @var string (last argument) */
        T::div(['class'=>'test'], 'my content');
// CASE 2
        /** @noinspection PhpUndefinedClassInspection */
        /** @method div( assoc_array $htmlAttributes, array_of_string ... $content ) */
        T::div(['class'=>'test'],
            ['my content', 'my second content'],
            [' another content']
        );
// CASE 3
        /** @noinspection PhpUndefinedClassInspection */
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        /** @method div( assoc_array $htmlAttributes, Renderable ... $content ) */
        T::span(['class'=>'test'],
            new Panel('my title','my content'),
            new Panel('my second title', 'my second content')
        );
// CASE 4
        /** @noinspection PhpUndefinedClassInspection */
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        /** @method div( assoc_array $htmlAttributes, mixed ... $content ) */
        /** @var mixed = array_of_string|Renderable */
        T::div(['class'=>'test'],
            [
                'some content',
                'another content'
            ],
            new Panel('my second title', 'my second content')
        );
// CASE 5
        /** @noinspection PhpUndefinedClassInspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent ) */
        /** @var mixed_content = string|Renderable */
        /** @var mixed = assoc_array|array_of_mixed_content|Renderable */
        T::div(['class'=>'test'], ['id'=>'test content'],
            [
                'some content',
                new Panel('my first panel title', 'my first content')
            ],
            new Panel('my second title', 'my second content')
        );

        // ###################### Attributes ################################
// CASE 1
        /** @noinspection PhpUndefinedClassInspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed = Attribute|string (last argument) */
        T::div(a::c1ass('test'), a::id('test-content'), 'my content');
// CASE 2
        /** @noinspection PhpUndefinedClassInspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed = Attribute|array_of_string */
        T::div(a::c1ass('test'), a::id('test-content'),
            ['my content ', 'my second content '],
            ['else content']
        );
// CASE 3
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed = Attribute|Renderable */
        T::span(a::c1ass('test'), a::id('test-content'),
            new Panel('my title','my content'),
            new Panel('my second title', 'my second content')
        );
// CASE 4
        /** @noinspection PhpUndefinedClassInspection, PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed = Attribute|array_of_string|Renderable */
        T::div(a::c1ass('test'), a::id('test-content'),
            [
                'some content',
                'another content'
            ],
            new Panel('my second title', 'my second content')
        );
// CASE 5
        /** @noinspection PhpUndefinedClassInspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed_content = string|Renderable */
        /** @var mixed = Attribute|array_of_mixed_content|Renderable */
        T::div(a::c1ass('test'), a::id('test-content'),
            [
                'some content',
                new Panel('my first panel title', 'my first content')
            ],
            new Panel('my second title', 'my second content')
        );

        // ###################### Attributes And Assoc ################################
// CASE 1
        /** @noinspection PhpUndefinedClassInspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed = Attribute|assoc_array|string (last argument) */
        T::div(a::c1ass('test'), ['id'=>'test-content'], 'my content');

// CASE 2
        /** @noinspection PhpUndefinedClassInspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed = Attribute|assoc_array|array_of_string */
        T::div(a::c1ass('test'), ['id'=>'test-content'],
            ['my content ', 'my second content '],
            ['another content']
        );
// CASE 3
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed = Attribute|assoc_array|Renderable */
        T::span(a::c1ass('test'), ['id'=>'test-content'],
            new Panel('my title','my content'),
            new Panel('my second title', 'my second content')
        );
// CASE 4
        /** @noinspection PhpUndefinedClassInspection, PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed = Attribute|assoc_array|array_of_string|Renderable */
        T::div(a::c1ass('test'), ['id'=>'test-content'],
            [
                'some content',
                'another content'
            ],
            new Panel('my second title', 'my second content')
        );
// CASE 5
        /** @noinspection PhpUndefinedClassInspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed_content = string|Renderable */
        /** @var mixed = Attribute|assoc_array|array_of_mixed_content|Renderable */
        T::div(a::c1ass('test'), ['id'=>'test-content'],
            [
                'some content',
                new Panel('my first panel title', 'my first content')
            ],
            new Panel('my second title', 'my second content')
        );

// CASE 6
        /** @noinspection PhpUndefinedClassInspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed_content = string|Renderable */
        /** @var mixed = Attribute|Attributes|assoc_array|array_of_mixed_content|string|Renderable*/
        T::div(
            a::c1ass('test'),                                       //Attribute   |
            ['id'=>'test-content'],                                 //assoc_array |
            [
                'some content',
                new Panel('my first panel title', 'my first content')
            ],                                                     // array_of_mixed_content |
            new Panel('my second title', 'my second content'),     // Renderable
            'aqua'                                                 // string
        );


        // CASE 6
        /** @noinspection PhpUndefinedClassInspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent ) */
        /** @var mixed = {attribute|content} */
        /** @var attribute = {Attribute|Attributes|assoc_array} */
        /** @var content = {string|array_of_string|array_of_mixed_content|Renderable} */
        /** @var mixed_content = {string|Renderable} */
        T::div(
            a::c1ass('test'),                                       //Attribute   |
            ['id'=>'test-content']
            ,                                 //assoc_array |
            [
                'some content',
                ' test'
            ]
            ,                                                     // array_of_mixed_content |
            new Panel('my second title', 'my second content'),     // Renderable
            'aqua'                                                 // string
        );
    }

}