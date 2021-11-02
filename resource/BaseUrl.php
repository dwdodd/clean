<?php

namespace resource;

use resource\Protocol;

class BaseUrl
{
    public static function url()
    {
        return Protocol::is().$_SERVER['HTTP_HOST'].Protocol::dir();
    }
}