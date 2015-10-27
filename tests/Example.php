<?php
namespace liphte\tests;
use liphte\tags\components\Renderable;
use liphte\tags\html\Attribute as a;
use liphte\tags\html\Attribute;
use liphte\tags\html\Tag;
use Panel;
use Windwalker\Dom\DomElements;

class Example {

    public function __construct()
    {

        $t = new Tag();

//        echo "\n" . $t->table( a::style('border: 1px solid #070;'),
//            [
//                $t->tr(
//                    [
//                        $t->td( a::style('border: 1px solid #000;' ),
//                            'Column 1'
//                        ),
//                        $t->td( a::style( 'border: 1px solid #000;' ),
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

        $t = new Tag();
        echo "\n";

        /** @noinspection PhpMethodParametersCountMismatchInspection */
        $t->span( a::ariaChecked('false') );

        echo $t->div( a::id('main'),
            [
                $t->h1( ['class' => 'test'], 'text' ),
                $t->h2( '{{title}}' ),
                $t->div( a::id('body'), a::c1ass('body', 'container'),
                    '{{body}}'
                )
            ],
            new Panel( 'Test' , 'This is a test panel')
        );
        echo "\n\n";
    }

    public function index()
    {

        $t = new Tag();
        echo "\n";
        echo "\n";

        echo $t->doctype(
            $t->html(['ng-app' => 'nameApp'],
                [
                    $t->head(
                        [
                            $t->meta(['charset' => 'utf-8']),
                            $t->title('Angular.js Example'),
                            $t->script(
                                ['src' => 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular.min.js']
                            ),
                            $t->script(
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
                    $t->body(['ng-controller' => 'NameCtrl'],
                        [
                            $t->ul(
                                [
                                    $t->li(['ng-repeat' => 'name in names track by $index'],
                                        [
                                            '{{name}}'
                                        ]
                                    )
                                ]
                            ),
                            $t->form(['ng-submit' => 'addName()'],
                                [
                                    $t->input(['type' => 'text', 'ng-model' => 'enteredName']),
                                    $t->input(['type' => 'submit', 'value' => 'add'])
                                ]
                            )
                            //'Frist name:' . $t->input( ['ng-model'=>'firstName', 'type'=>'text'] ),
                            //$t->br(),
                            //'Last name:' . $t->input( ['ng-model'=>'lastName', 'type'=>'text'] ),
                            //$t->br(),
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
        $t = new Tag();

        echo "\n";

        $comment = "!--";
        echo (string) new DomElements(
            [
                $t->$comment("HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries"),
                $t->$comment("WARNING: Respond.js doesn't work if you view the page via file://"),
                $t->$comment(
                    [
                        '[if lt IE 9]',
                        $t->script(a::src("https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js")),
                        $t->script(a::src("https://oss.maxcdn.com/respond/1.4.2/respond.min.js")),
                        '[endif]'
                    ]
                )
            ]
        );

        echo "\n";
    }

    private function needing() {

        $t = new Tag();
// CASE 1
        /** @noinspection PhpUndefinedClassInspection */
        /** @method div( assoc_array $htmlAttributes, string $content ) */
        /** @var string (last argument) */
        $t->div(['class'=>'test'], 'my content');
// CASE 2
        /** @noinspection PhpUndefinedClassInspection */
        /** @method div( assoc_array $htmlAttributes, array_of_string ... $content ) */
        $t->div(['class'=>'test'],
            ['my content', 'my second content'],
            [' another content']
        );
// CASE 3
        /** @noinspection PhpUndefinedClassInspection */
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        /** @method div( assoc_array $htmlAttributes, Renderable ... $content ) */
        $t->span(['class'=>'test'],
            new Panel('my title','my content'),
            new Panel('my second title', 'my second content')
        );
// CASE 4
        /** @noinspection PhpUndefinedClassInspection */
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        /** @method div( assoc_array $htmlAttributes, mixed ... $content ) */
        /** @var mixed = array_of_string|Renderable */
        $t->div(['class'=>'test'],
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
        $t->div(['class'=>'test'], ['id'=>'test content'],
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
        $t->div(a::c1ass('test'), a::id('test-content'), 'my content');
// CASE 2
        /** @noinspection PhpUndefinedClassInspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed = Attribute|array_of_string */
        $t->div(a::c1ass('test'), a::id('test-content'),
            ['my content ', 'my second content '],
            ['else content']
        );
// CASE 3
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed = Attribute|Renderable */
        $t->span(a::c1ass('test'), a::id('test-content'),
            new Panel('my title','my content'),
            new Panel('my second title', 'my second content')
        );
// CASE 4
        /** @noinspection PhpUndefinedClassInspection, PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed = Attribute|array_of_string|Renderable */
        $t->div(a::c1ass('test'), a::id('test-content'),
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
        $t->div(a::c1ass('test'), a::id('test-content'),
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
        $t->div(a::c1ass('test'), ['id'=>'test-content'], 'my content');

// CASE 2
        /** @noinspection PhpUndefinedClassInspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed = Attribute|assoc_array|array_of_string */
        $t->div(a::c1ass('test'), ['id'=>'test-content'],
            ['my content ', 'my second content '],
            ['another content']
        );
// CASE 3
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed = Attribute|assoc_array|Renderable */
        $t->span(a::c1ass('test'), ['id'=>'test-content'],
            new Panel('my title','my content'),
            new Panel('my second title', 'my second content')
        );
// CASE 4
        /** @noinspection PhpUndefinedClassInspection, PhpMethodParametersCountMismatchInspection */
        /** @method div( mixed ... $htmlAttributesOrContent) */
        /** @var mixed = Attribute|assoc_array|array_of_string|Renderable */
        $t->div(a::c1ass('test'), ['id'=>'test-content'],
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
        $t->div(a::c1ass('test'), ['id'=>'test-content'],
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
        $t->div(
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
        $t->div(
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