<?php

class ClassLoader
{
    private static $array = [];

    public static function run($array)
    {
        self::$array = $array;
        spl_autoload_register(function($class){
            foreach (self::$array as $key) {
                //echo $directory = str_replace('\\', '/', substr(dirname(__DIR__),0,21).'/'.$key.$class).'.php<br>';
                if(file_exists($directory = str_replace('\\', '/', substr(dirname(__FILE__),0,21).'/'.$key.$class).'.php')) require_once($directory);
            }
        });
    }
}