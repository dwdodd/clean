<?php

namespace resource;

class GetUrl
{
    public static function param($get)
    {
        $params = ltrim($get,'/');
        $dir    = explode('/', $params);
        $param  = (object)['param'=>$dir[0]];
        return $param;
    }
}