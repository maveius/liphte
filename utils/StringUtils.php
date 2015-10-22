<?php


namespace liphte\utils;

class StringUtils
{

    public static function startsWith($sourceString, $startString)
    {
        // search backwards starting from haystack length characters from the end
        return $startString === "" || strrpos($sourceString, $startString, -strlen($sourceString)) !== FALSE;
    }

    public static function endsWith($sourceString, $endString)
    {
        // search forward starting from end minus needle length characters
        return $endString === "" || (($temp = strlen($sourceString) - strlen($endString)) >= 0 &&
            strpos($sourceString, $endString, $temp) !== FALSE);
    }

}
