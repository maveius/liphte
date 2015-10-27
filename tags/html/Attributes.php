<?php
/**
 * Created by PhpStorm.
 * User: maveius
 * Date: 23.10.15
 * Time: 12:09
 */

namespace html;


use liphte\tags\html\Attribute;

class Attributes
{
    private $attributes;

    public function __construct()
    {
        $this->attributes = array();
        $this->prepareArguments(func_get_args());
    }

    private function prepareArguments(array $arguments)
    {
        foreach ($arguments as $argument) {

            if( $argument instanceof Attribute ) {

                $this->attributes[$argument->getName()] = $argument->getContent();
            } else if ( is_array($argument) ){

                $this->prepareArguments($argument);
            }
        }

    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    public static function merge($attributes, $attribute) {

        return array_merge($attributes, (new Attributes($attribute))->getAttributes());
    }
}

