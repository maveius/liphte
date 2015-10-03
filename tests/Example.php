<?php
namespace liphte\tests;
use liphte\tags\html\Attribute as a;
use liphte\tags\html\Tag;
use Panel;

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
        //$this->index();
    }

    public function template()
    {

        $t = new Tag();
        echo "\n";

        /** @noinspection PhpMethodParametersCountMismatchInspection */
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

        echo $t->doctype() .
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
            );
        echo "\n";
    }

}