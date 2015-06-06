<?php
namespace liphte\html\tags;

use liphte\utils\Numbers;
use Windwalker\Dom\DomElement;

class Tag {

    private $name;
    private $arguments;


    public function __call($name, $arguments) {

        $this->name = $name;
        $this->arguments = $arguments;

        return (string) new DomElement( $name, $this->getContent(), $this->getAttributes() );
    }


    private function getContent() {

        /** @noinspection PhpParamsInspection */
        return $this->getArgument(Numbers::SECOND);
    }


    private function getAttributes() {

        /** @noinspection PhpParamsInspection */
        return $this->getArgument(Numbers::FIRST);
    }

    /**
     * @param integer $index
     * @return mixed
     */
    private function getArgument( $index ) {

        $intIndex = (integer) $index;
        if( $intIndex < count($this->arguments) ) {

            return $this->arguments[ $intIndex ];
        } else {

            return '';
        }
    }
}