<?php

class Protocol
{
    public static function is()
    {
        if( $_SERVER['HTTP_HOST'] == 'localhost' ) return 'http://';
        return 'https://';
    }

    public static function dir()
    {
        if( $_SERVER['HTTP_HOST'] == 'localhost' ) return '/clean/';
        return '/';
    }
}