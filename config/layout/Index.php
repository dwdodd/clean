<?php

class Index
{
    public static function root()
    {
        if(!isset($_SESSION)) session_start();

        $reqUri = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
        $param  = (object)['index'=> @$reqUri[3]];

        if( count($reqUri) == 3 ) header('location:' . BaseUrl::url());

        UrlParamsCompareIndex::param(['registro','recuperar-acceso'], $param->index);

        switch($param->index) {
            case 'registro':
                $file = file_get_contents('config/layout/index/register.php');
            break;

            case 'recuperar-acceso':
                $file = file_get_contents('config/layout/index/recover-passwd.php');
            break;
            
            default:
                $file = file_get_contents('config/layout/index/login.php');
            break;
        }

        $keys   = ['{{host}}','{@CSRF}'];
        $values = [BaseUrl::url(), self::token()];
        
        exit(str_replace($keys, $values, $file));
    }

    private static function token()
    {
        $_SESSION['token-csrf'] = substr(str_shuffle('1234567890abcdefghijklmnopqrstuxyzABCDEFGHIJKLMNOPQRSTUXYZ'),0,50);
        return $_SESSION['token-csrf'];
    }
}