<?php

class ComponentView
{
    public static function render($file)
    {
        return file_get_contents('component/'.$file.'.php');
    }
}