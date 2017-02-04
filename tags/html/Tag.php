<?php
namespace liphte\tags\html;

use html\Attributes;
use liphte\tags\components\Renderable;
use liphte\utils\Numbers;
use liphte\utils\StringUtils;
use Windwalker\Dom\HtmlElement;

/**
 * Class Tag
 * @package liphte\html\tags
 *
 *
 * @method string a ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string abbr ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string address ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string area ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string article ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string aside ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string audio ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string b ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string base ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string bdi ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string bdo ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string blockquote ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string body ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string br ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string button ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string canvas ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string caption ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string cite ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string code ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string col ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string colgroup ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string command ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string datalist ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string dd ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string del ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string details ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string dfn ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string div ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string dl ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string dt ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string em ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string embed ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string fieldset ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string figcaption ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string figure ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string footer ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string form ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string h1 ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string h2 ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string h3 ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string h4 ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string h5 ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string h6 ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string head ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string header ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string hgroup ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string hr ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string html ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string i ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string iframe ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string img ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string input ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string ins ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string kbd ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string keygen ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string label ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string legend ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string li ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string link ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string map ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string mark ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string menu ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string meta ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string meter ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string nav ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string noscript ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string object ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string ol ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string optgroup ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string option ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string output ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string p ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string param ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string pre ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string progress ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string q ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string rp ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string rt ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string ruby ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string s ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string samp ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string script ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string section ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string select ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string small ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string source ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string span ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string strong ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string style ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string sub ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string summary ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string sup ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string table ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string tbody ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string td ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string textarea ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string tfoot ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string th ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string thead ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string time ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string title ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string tr ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string track ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string u ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string ul ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string var ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string video ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method string wbr ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 *
 */
class Tag
{

    private static $instance;

    private $doctype = "<!DOCTYPE html>";
    private $xmlns = "http://www.w3.org/1999/xhtml";
    private $doctypeXhtml =
        '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN ' .
        'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n';

    protected function __construct() {}

    public function __call($name, $arguments)
    {

        if( $this->isComment($name) ) {
            return $this->getComment($arguments, $name);
        }

        return (string) new HtmlElement($name, $this->getContent($arguments), $this->getAttributes($arguments));
    }


    private function getContent(array $arguments)
    {
        $content = array();

        foreach ($arguments as $argument) {

            $content = $this->prepare( $content, $argument );

        }

        return empty($content) ? null : $content;
    }


    private function getAttributes(array $arguments)
    {

        $attributes = array();

        foreach ($arguments as $attribute) {

            $attributes = $this->extract($attributes, $attribute);

        }

        return $attributes;
    }
/**/
    /**
     * @param $arguments
     * @param integer $index
     * @return mixed
     */
    private function getArgument($arguments, $index)
    {

        $intIndex = (integer) $index;

        if (count($arguments) === 0) {
            return null;
        } elseif ($intIndex < count($arguments)) {

            $result = $arguments[ $intIndex ];
            if (!$result instanceof Attribute) {
                return $result;
            } else {
                return null;
            }

        } else {
            return $this->getArgument($arguments, Numbers::FIRST);
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

    private function getComment($arguments, $name)
    {
        $content = implode('', $this->getContent($arguments) );
        $condition = $closeCondition = '';

        if( StringUtils::startsWith($content, '[if') ) {

            $space = '';
            $content = '';
            $first = true;
            foreach ($this->getContent($arguments) as $contentRow ) {

                if( $first ) {
                    $condition = $contentRow . '> ';
                    $first = false;
                } else if ( $contentRow !== '[endif]' ) {
                    $content .= $contentRow;
                }  else {
                    $closeCondition = '<!' . $contentRow;
                }
            }

        } else {
            $space = ' ';
        }

        return
            '<' . $name .
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

            $content[] = $magicArgument;

        } else if ( $magicArgument instanceof Renderable || $this->canBeRender( $magicArgument ) ) {

            $content[] = $magicArgument->render();

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

    /**
     * @return Tag
     */
    public static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new Tag();
        }

        return self::$instance;
    }

}