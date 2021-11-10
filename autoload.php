<?php

    if(!@$_SESSION) session_start();
    spl_autoload_register(function($class){
        if(file_exists($directory = str_replace('\\', '/', substr(dirname(__FILE__),0,21).'/'.$class).'.php')) require_once($directory);
    });