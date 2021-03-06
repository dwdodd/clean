<?php

namespace resource;

class UrlParamsCompareIndex
{
    public static function param($verbs=[], $param)
    {
        if( $param && !in_array($param, $verbs) ) exit(self::text($param));
    }

    private static function text($param)
    {
        return '<div style="color:#0A43C8;text-align:center;margin-top:5%;font-size:80px;font-weight:bold;font-family:tahoma;">404<br>Not Found ('.$param.')</div>';
    }
}