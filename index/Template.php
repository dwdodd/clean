<?php

namespace index;

use resource\{UrlParamsCompareIndex,BaseUrl};

class Template
{
    public static function index()
    {
        if(!isset($_SESSION)) session_start();

        $reqUri = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
        $param  = (object)['index'=> @$reqUri[3]];

        if( count($reqUri) == 3 ) header('location:' . BaseUrl::url());

        UrlParamsCompareIndex::param(['registro','recuperar-acceso'], $param->index);

        switch($param->index) {
            case 'registro':
                $component = file_get_contents('index/content/register.php');
            break;

            case 'recuperar-acceso':
                $component = file_get_contents('index/content/recover-passwd.php');
            break;
            
            default:
                $component = file_get_contents('index/content/login.php');
            break;
        }

        $keys   = ['{{host}}','{@CSRF}'];
        $values = [BaseUrl::url(), self::token()];
        
        exit(str_replace($keys, $values, $component));
    }

    private static function token()
    {
        $_SESSION['token-csrf'] = substr(str_shuffle('1234567890abcdefghijklmnopqrstuxyzABCDEFGHIJKLMNOPQRSTUXYZ'),0,50);
        return $_SESSION['token-csrf'];
    }
}