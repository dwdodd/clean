<?php

class HeaderLocation
{
    public static function logout()
    {
        header('location: //'.$_SERVER['HTTP_HOST'].'/clean');
    }

    public static function header_location()
    {
        return header('location: /clean');
    }
}