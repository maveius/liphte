<?php
namespace liphte\tags\html;

use liphte\tags\components\Renderable;
use liphte\utils\Numbers;
use Windwalker\Dom\HtmlElement;

/**
 * Class Tag
 * @package liphte\html\tags
 *
 *
 * @method string a ( array $htmlAttributes = array (), mixed $content = null )
 * @method string abbr ( array $htmlAttributes = array (), mixed $content = null )
 * @method string address ( array $htmlAttributes = array (), mixed $content = null )
 * @method string area ( array $htmlAttributes = array (), mixed $content = null )
 * @method string article ( array $htmlAttributes = array (), mixed $content = null )
 * @method string aside ( array $htmlAttributes = array (), mixed $content = null )
 * @method string audio ( array $htmlAttributes = array (), mixed $content = null )
 * @method string b ( array $htmlAttributes = array (), mixed $content = null )
 * @method string base ( array $htmlAttributes = array (), mixed $content = null )
 * @method string bdi ( array $htmlAttributes = array (), mixed $content = null )
 * @method string bdo ( array $htmlAttributes = array (), mixed $content = null )
 * @method string blockquote ( array $htmlAttributes = array (), mixed $content = null )
 * @method string body ( array $htmlAttributes = array (), mixed $content = null )
 * @method string br ( array $htmlAttributes = array (), mixed $content = null )
 * @method string button ( array $htmlAttributes = array (), mixed $content = null )
 * @method string canvas ( array $htmlAttributes = array (), mixed $content = null )
 * @method string caption ( array $htmlAttributes = array (), mixed $content = null )
 * @method string cite ( array $htmlAttributes = array (), mixed $content = null )
 * @method string code ( array $htmlAttributes = array (), mixed $content = null )
 * @method string col ( array $htmlAttributes = array (), mixed $content = null )
 * @method string colgroup ( array $htmlAttributes = array (), mixed $content = null )
 * @method string command ( array $htmlAttributes = array (), mixed $content = null )
 * @method string datalist ( array $htmlAttributes = array (), mixed $content = null )
 * @method string dd ( array $htmlAttributes = array (), mixed $content = null )
 * @method string del ( array $htmlAttributes = array (), mixed $content = null )
 * @method string details ( array $htmlAttributes = array (), mixed $content = null )
 * @method string dfn ( array $htmlAttributes = array (), mixed $content = null )
 * @method string div ( array $htmlAttributes = array (), mixed $content = null )
 * @method string dl ( array $htmlAttributes = array (), mixed $content = null )
 * @method string dt ( array $htmlAttributes = array (), mixed $content = null )
 * @method string em ( array $htmlAttributes = array (), mixed $content = null )
 * @method string embed ( array $htmlAttributes = array (), mixed $content = null )
 * @method string fieldset ( array $htmlAttributes = array (), mixed $content = null )
 * @method string figcaption ( array $htmlAttributes = array (), mixed $content = null )
 * @method string figure ( array $htmlAttributes = array (), mixed $content = null )
 * @method string footer ( array $htmlAttributes = array (), mixed $content = null )
 * @method string form ( array $htmlAttributes = array (), mixed $content = null )
 * @method string h1 ( array $htmlAttributes = array (), mixed $content = null )
 * @method string h2 ( array $htmlAttributes = array (), mixed $content = null )
 * @method string h3 ( array $htmlAttributes = array (), mixed $content = null )
 * @method string h4 ( array $htmlAttributes = array (), mixed $content = null )
 * @method string h5 ( array $htmlAttributes = array (), mixed $content = null )
 * @method string h6 ( array $htmlAttributes = array (), mixed $content = null )
 * @method string head ( array $htmlAttributes = array (), mixed $content = null )
 * @method string header ( array $htmlAttributes = array (), mixed $content = null )
 * @method string hgroup ( array $htmlAttributes = array (), mixed $content = null )
 * @method string hr ( array $htmlAttributes = array (), mixed $content = null )
 * @method string html ( array $htmlAttributes = array (), mixed $content = null )
 * @method string i ( array $htmlAttributes = array (), mixed $content = null )
 * @method string iframe ( array $htmlAttributes = array (), mixed $content = null )
 * @method string img ( array $htmlAttributes = array (), mixed $content = null )
 * @method string input ( array $htmlAttributes = array (), mixed $content = null )
 * @method string ins ( array $htmlAttributes = array (), mixed $content = null )
 * @method string kbd ( array $htmlAttributes = array (), mixed $content = null )
 * @method string keygen ( array $htmlAttributes = array (), mixed $content = null )
 * @method string label ( array $htmlAttributes = array (), mixed $content = null )
 * @method string legend ( array $htmlAttributes = array (), mixed $content = null )
 * @method string li ( array $htmlAttributes = array (), mixed $content = null )
 * @method string link ( array $htmlAttributes = array (), mixed $content = null )
 * @method string map ( array $htmlAttributes = array (), mixed $content = null )
 * @method string mark ( array $htmlAttributes = array (), mixed $content = null )
 * @method string menu ( array $htmlAttributes = array (), mixed $content = null )
 * @method string meta ( array $htmlAttributes = array (), mixed $content = null )
 * @method string meter ( array $htmlAttributes = array (), mixed $content = null )
 * @method string nav ( array $htmlAttributes = array (), mixed $content = null )
 * @method string noscript ( array $htmlAttributes = array (), mixed $content = null )
 * @method string object ( array $htmlAttributes = array (), mixed $content = null )
 * @method string ol ( array $htmlAttributes = array (), mixed $content = null )
 * @method string optgroup ( array $htmlAttributes = array (), mixed $content = null )
 * @method string option ( array $htmlAttributes = array (), mixed $content = null )
 * @method string output ( array $htmlAttributes = array (), mixed $content = null )
 * @method string p ( array $htmlAttributes = array (), mixed $content = null )
 * @method string param ( array $htmlAttributes = array (), mixed $content = null )
 * @method string pre ( array $htmlAttributes = array (), mixed $content = null )
 * @method string progress ( array $htmlAttributes = array (), mixed $content = null )
 * @method string q ( array $htmlAttributes = array (), mixed $content = null )
 * @method string rp ( array $htmlAttributes = array (), mixed $content = null )
 * @method string rt ( array $htmlAttributes = array (), mixed $content = null )
 * @method string ruby ( array $htmlAttributes = array (), mixed $content = null )
 * @method string s ( array $htmlAttributes = array (), mixed $content = null )
 * @method string samp ( array $htmlAttributes = array (), mixed $content = null )
 * @method string script ( array $htmlAttributes = array (), mixed $content = null )
 * @method string section ( array $htmlAttributes = array (), mixed $content = null )
 * @method string select ( array $htmlAttributes = array (), mixed $content = null )
 * @method string small ( array $htmlAttributes = array (), mixed $content = null )
 * @method string source ( array $htmlAttributes = array (), mixed $content = null )
 * @method string span ( array $htmlAttributes = array (), mixed $content = null )
 * @method string strong ( array $htmlAttributes = array (), mixed $content = null )
 * @method string style ( array $htmlAttributes = array (), mixed $content = null )
 * @method string sub ( array $htmlAttributes = array (), mixed $content = null )
 * @method string summary ( array $htmlAttributes = array (), mixed $content = null )
 * @method string sup ( array $htmlAttributes = array (), mixed $content = null )
 * @method string table ( array $htmlAttributes = array (), mixed $content = null )
 * @method string tbody ( array $htmlAttributes = array (), mixed $content = null )
 * @method string td ( array $htmlAttributes = array (), mixed $content = null )
 * @method string textarea ( array $htmlAttributes = array (), mixed $content = null )
 * @method string tfoot ( array $htmlAttributes = array (), mixed $content = null )
 * @method string th ( array $htmlAttributes = array (), mixed $content = null )
 * @method string thead ( array $htmlAttributes = array (), mixed $content = null )
 * @method string time ( array $htmlAttributes = array (), mixed $content = null )
 * @method string title ( array $htmlAttributes = array (), mixed $content = null )
 * @method string tr ( array $htmlAttributes = array (), mixed $content = null )
 * @method string track ( array $htmlAttributes = array (), mixed $content = null )
 * @method string u ( array $htmlAttributes = array (), mixed $content = null )
 * @method string ul ( array $htmlAttributes = array (), mixed $content = null )
 * @method string var ( array $htmlAttributes = array (), mixed $content = null )
 * @method string video ( array $htmlAttributes = array (), mixed $content = null )
 * @method string wbr ( array $htmlAttributes = array (), mixed $content = null )
 *
 *
 */
class Tag
{

    private $doctype = "<!DOCTYPE html>";
    private $xmlns = "http://www.w3.org/1999/xhtml";
    private $doctypeXhtml =
        '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN ' .
        'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n';

    private $name;
    private $attributes;

    public function __call($name, $arguments)
    {

        $this->name = $name;
        $this->attributes = $arguments;

        return (string) new HtmlElement($name, $this->getContent(), $this->getAttributes());
    }


    private function getAttributes()
    {

        $attributes = $this->getAttributesObjects();

        if ($this->isStillEmpty($attributes)) {

            $attributes = $this->getAttributesAssociative();
        }

        return $attributes;
    }


    private function getContent()
    {
        $content = $this->getContentObjects();

        if ($this->isStillEmpty($content)) {

            $content = $this->getContentArray();
        }

        return $content;
    }

    private function isStillEmpty(array $array)
    {

        return $array === null || count($array) === 0;
    }

    private function getAttributesObjects()
    {

        $attributes = array ();

        foreach ($this->attributes as $attribute) {

            if ($attribute instanceof Attribute) {

                $attributes[ $attribute->getName() ] = $attribute->getContent();
            } else if ( $this->is_assoc( $attribute ) ) {

                foreach ( $attribute as $key => $value ) {

                    $attributes[ $key ] = $value;
                }
            }

        }

        return $attributes;
    }

    private function getAttributesAssociative()
    {

        $attributes = $this->getArgument(Numbers::FIRST);

        if ($attributes === null || !$this->is_assoc($attributes)) {
            return array ();
        }

        return $attributes;
    }

    private function getContentObjects()
    {

        $content = array ();

        foreach ($this->attributes as $argument) {

            if ( $argument instanceof Renderable ||
                ( !is_string($argument) && method_exists($argument, 'render') ) ) {

                array_push( $content, $argument->render() );
            } else if( is_array( $argument ) && ! $this->is_assoc( $argument ) && !$argument instanceof Renderable ) {

                foreach ( $argument as $element ) {

                    if( is_string( $element ) ) {
                        array_push( $content, $element );
                    } else if ( $element instanceof Renderable || method_exists($argument, 'render') ) {
                        array_push( $content, $element->render() );
                    }
                }
            }

        }

        return $content;
    }

    private function getContentArray()
    {
        $contentObject = $this->getLastArgument();

        if ($this->is_assoc($contentObject) || $contentObject === null) {
            return null;
        }

        $content = array ();

        if( is_array($contentObject) && !$this->isStillEmpty($contentObject) ) {

            foreach ($contentObject as $argument) {

                if ($argument instanceof Renderable || method_exists($argument, 'render')) {
                    array_push( $content, $argument->render() );
                } else {
                    array_push( $content, $argument );
                }

            }
        } else {
            array_push( $content, $contentObject );
        }

        return $content;
    }

    /**
     * @param integer $index
     *
     * @return mixed
     */
    private function getArgument($index)
    {

        $intIndex = (integer) $index;

        if (count($this->attributes) === 0) {
            return null;
        } elseif ($intIndex < count($this->attributes)) {

            $result = $this->attributes[ $intIndex ];
            if (!$result instanceof Attribute) {
                return $result;
            } else {
                return null;
            }

        } else {
            return $this->getArgument(Numbers::FIRST);
        }
    }

    private function getLastArgument()
    {

        if (count($this->attributes) > 0) {

            return $this->getArgument(count($this->attributes) - 1);
        }

        return null;
    }

    private function is_assoc($array)
    {

        return is_array($array) && (bool) count(array_filter(array_keys($array), 'is_string'));
    }

    /**
     * @return string
     */
    public function getXmlns()
    {

        return $this->xmlns;
    }

    /**
     * @return string
     */
    public function getDoctypeXhtml()
    {

        return $this->doctypeXhtml;
    }

    public function doctype()
    {

        return $this->doctype;
    }
}