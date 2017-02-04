<?php


namespace liphte;


use liphte\tags\html\Tag;

class Liphte
{
    public static function tag() {
        return Tag::getInstance();
    }
}