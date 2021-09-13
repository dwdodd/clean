<?php

class View
{
    public static function content($file)
    {
        return file_get_contents('content/'.$file.'.php');
    }
}