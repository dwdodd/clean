<?php

namespace resource;

class Document
{
    public static function content($keys, $values, $file)
    {
        return str_replace($keys, $values, file_get_contents("content/$file.php"));
    }
}