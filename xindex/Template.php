<?php

namespace xindex;

use resource\{UrlParamsCompare,BaseUrl};

class Template
{
    public static function index()
    {
        $reqUri = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
        $param  = (object)['index'=> @$reqUri[3]];

        if( count($reqUri) == 3 ) header('location:' . BaseUrl::url());

        UrlParamsCompare::param(['registro','recuperar-acceso'], $param->index);

        switch($param->index) {
            case 'registro':
                $component = file_get_contents('xindex/content/register.php');
            break;

            case 'recuperar-acceso':
                $component = file_get_contents('xindex/content/recover-passwd.php');
            break;
            
            default:
                $component = file_get_contents('xindex/content/login.php');
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