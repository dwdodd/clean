<?php

namespace resource;

class Protocol
{
    public static function is()
    {
        return $_SERVER['HTTP_HOST'] == 'localhost' ? 'http://' :'https://';
    }

    public static function dir()
    {
        return $_SERVER['HTTP_HOST'] == 'localhost' ? '/clean/' :'/';
    }
}