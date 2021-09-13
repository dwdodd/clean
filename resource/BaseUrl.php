<?php

class BaseUrl
{
    public static function url()
    {
        return 'http://'.$_SERVER['HTTP_HOST'].'/clean';
    }
}