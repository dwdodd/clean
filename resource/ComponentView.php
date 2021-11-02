<?php

namespace resource;

class ComponentView
{
    public static function render($file)
    {
        return file_get_contents('component/'.$file.'.php');
    }
}