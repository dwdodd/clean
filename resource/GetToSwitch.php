<?php

class GetToSwitch
{
    public static function param($get)
    {
        $params = ltrim($get,'/');
        $dir    = explode('/', $params);
        $param  = (object)['view'=>$dir[0]];
        return $param;
    }
}