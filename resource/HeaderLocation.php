<?php

namespace resource;

use resource\Protocol;

class HeaderLocation
{
    public static function logout()
    {
        header('location:'.Protocol::is().$_SERVER['HTTP_HOST'].Protocol::dir());
    }

    public static function header_location()
    {
        return header('location:'.Protocol::dir());
    }
}