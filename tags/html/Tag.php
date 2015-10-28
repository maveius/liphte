<?php
namespace liphte\tags\html;

use html\Attributes;
use liphte\tags\components\Renderable;
use liphte\utils\Numbers;
use liphte\utils\StringUtils;
use Windwalker\Dom\Builder\DomBuilder;
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

        if( $this->isComment($name) ) {
            return $this->getComment();
        }

        return (string) new HtmlElement($name, $this->getContent(), $this->getAttributes());
    }


    private function getAttributes()
    {

        $attributes = array();

        foreach ($this->attributes as $attribute) {

            $attributes = $this->extract($attributes, $attribute);

        }

        return $attributes;
    }


    private function getContent()
    {
        $content = array();

        foreach ($this->attributes as $argument) {

            $content = $this->prepare( $content, $argument );

        }

        return empty($content) ? null : $content;
    }
/**/
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

        if( func_num_args() > 0 ) {
            return $this->doctype . func_get_arg(0);
        }

        return $this->doctype;
    }

    private function getComment()
    {
        $content = implode('', $this->getContent() );
        $condition = $closeCondition = '';

        if( StringUtils::startsWith($content, '[if') ) {

            $space = '';
            $content = '';
            $first = true;
            foreach ($this->getContent() as $contentRow ) {

                if( $first ) {
                    $condition = $contentRow . '> ';
                    $first = false;
                } else if ( $contentRow !== '[endif]' ) {
                    $content .= $contentRow;
                }  else {
                    $closeCondition = "<!" . $contentRow;
                }
            }

        } else {
            $space = ' ';
        }

        return
            '<' . $this->name .
            $space .
            $condition .
            $content .
            $space .
            $closeCondition . '-->';
    }

    private function extract($attributes, $attribute)
    {

        if ($attribute instanceof Attribute) {

            $attributes = Attributes::merge($attributes, $attribute);

        } else if ( $attribute instanceof Attributes ) {

            $attributes = $attribute->getAttributes();

        } else if ( $this->isAssoc( $attribute ) ) {

            $attributes = array_merge($attributes, $attribute);

        }

        return $attributes;
    }

    private function prepare($content, $magicArgument)
    {

        if ( is_string($magicArgument) ) {

            array_push($content, $magicArgument);

        } else if ( $magicArgument instanceof Renderable || $this->canBeRender( $magicArgument ) ) {

            array_push( $content, $magicArgument->render() );

        } else if( is_array( $magicArgument ) && ! $this->isAssoc( $magicArgument ) ) {

            foreach ($magicArgument as $element) {

                $content = $this->prepare( $content, $element );
            }

        }

        return $content;
    }

    private function canBeRender($object) {

        return !is_string($object) && method_exists($object, 'render') ;
    }

    private function isAssoc($array)
    {

        return is_array($array) && (bool) count(array_filter(array_keys($array), 'is_string'));
    }

    private function isComment($name)
    {
        return $name === '!--';
    }

}