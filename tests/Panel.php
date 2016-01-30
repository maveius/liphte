<?php


use liphte\tags\components\Renderable;
use liphte\tags\html\Attribute as a;
use liphte\tags\html\Tag as T;

class Panel implements Renderable
{

    private $title;
    private $content;

    /**
     * Panel constructor.
     * @param mixed $title
     * @param mixed $content
     */
    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }


    public function render()
    {
        /**
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
         *
         */


        return T::div( a::c1ass("panel", "panel-default"),
            [
                T::div( a::c1ass("panel-heading"),
                    T::h3( a::c1ass("panel-title"),
                        $this->title
                    )
                ),
                T::div( a::c1ass("panel-body"),
                    $this->content
                )
            ]
        );
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }


}