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
 * @method static string a ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string abbr ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string address ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string area ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string article ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string aside ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string audio ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string b ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string base ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string bdi ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string bdo ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string blockquote ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string body ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string br ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string button ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string canvas ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string caption ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string cite ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string code ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string col ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string colgroup ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string command ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string datalist ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string dd ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string del ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string details ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string dfn ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string div ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string dl ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string dt ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string em ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string embed ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string fieldset ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string figcaption ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string figure ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string footer ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string form ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string h1 ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string h2 ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string h3 ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string h4 ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string h5 ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string h6 ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string head ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string header ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string hgroup ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string hr ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string html ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string i ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string iframe ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string img ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string input ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string ins ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string kbd ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string keygen ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string label ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string legend ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string li ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string link ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string map ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string mark ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string menu ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string meta ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string meter ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string nav ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string noscript ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string object ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string ol ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string optgroup ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string option ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string output ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string p ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string param ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string pre ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string progress ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string q ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string rp ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string rt ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string ruby ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string s ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string samp ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string script ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string section ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string select ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string small ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string source ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string span ( $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string strong ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string style ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string sub ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string summary ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string sup ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string table ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string tbody ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string td ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string textarea ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string tfoot ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string th ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string thead ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string time ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string title ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string tr ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string track ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string u ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string ul ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string var ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string video ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 * @method static string wbr ( array $htmlAttributes = array (), mixed ... $attributesOrContent )
 *
 *
 */
class Tag
{

    private static $doctype = "<!DOCTYPE html>";
    private static $xmlns = "http://www.w3.org/1999/xhtml";
    private static $doctypeXhtml =
        '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN ' .
        'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n';

    public static function __callStatic($name, $arguments)
    {

        if( static::isComment($name) ) {
            return static::getComment($name, $arguments);
        }

        return (string) new HtmlElement($name, static::getContent($arguments), static::getAttributes($arguments));
    }


    private static function getAttributes($inputAttributes)
    {

        $attributes = array();

        foreach ($inputAttributes as $attribute) {

            $attributes = static::extract($attributes, $attribute);

        }

        return $attributes;
    }


    private static function getContent($inputAttributes)
    {
        $content = array();

        foreach ($inputAttributes as $argument) {

            $content = static::prepare( $content, $argument );

        }

        return empty($content) ? null : $content;
    }
/**/
    /**
     * @param integer $index
     * @param $arguments
     * @return mixed
     */
    private static function getArgument($index, $arguments)
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
            return static::getArgument(Numbers::FIRST, $arguments);
        }
    }

    /**
     * @return string
     */
    public static function getXmlns()
    {

        return self::$xmlns;
    }

    /**
     * @return string
     */
    public static function getDoctypeXhtml()
    {

        return self::$doctypeXhtml;
    }

    public static function doctype()
    {

        if( func_num_args() > 0 ) {
            return self::$doctype . func_get_arg(0);
        }

        return self::$doctype;
    }

    /**
     * @param string $name
     * @param $arguments
     * @return string
     */
    private static function getComment($name, $arguments)
    {
        $content = implode('', static::getContent($arguments) );
        $condition = $closeCondition = '';

        if( StringUtils::startsWith($content, '[if') ) {

            $space = '';
            $content = '';
            $first = true;
            foreach (self::getContent($arguments) as $contentRow ) {

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
            '<' . $name .
            $space .
            $condition .
            $content .
            $space .
            $closeCondition . '-->';
    }

    private static function extract($attributes, $attribute)
    {

        if ($attribute instanceof Attribute) {

            $attributes = Attributes::merge($attributes, $attribute);

        } else if ( $attribute instanceof Attributes ) {

            $attributes = $attribute->getAttributes();

        } else if ( self::isAssoc( $attribute ) ) {

            $attributes = array_merge($attributes, $attribute);

        }

        return $attributes;
    }

    private static function prepare($content, $magicArgument)
    {

        if ( is_string($magicArgument) ) {

            array_push($content, $magicArgument);

        } else if ( $magicArgument instanceof Renderable || self::canBeRender( $magicArgument ) ) {

            array_push( $content, $magicArgument->render() );

        } else if( is_array( $magicArgument ) && ! self::isAssoc( $magicArgument ) ) {

            foreach ($magicArgument as $element) {

                $content = self::prepare( $content, $element );
            }

        }

        return $content;
    }

    private static function canBeRender($object) {

        return !is_string($object) && method_exists($object, 'render') ;
    }

    private static function isAssoc($array)
    {

        return is_array($array) && (bool) count(array_filter(array_keys($array), 'is_string'));
    }

    private static function isComment($name)
    {
        return $name === '!--';
    }

}