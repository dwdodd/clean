<?php

define('PATH_TO', '../../../');
require_once PATH_TO . 'resource/ClassLoader.php';

ClassLoader::run([
    'resource/',
    'config/layout/',
    'connection/',
    'connection/manager/',
    'src/interface/',
    'src/test/',
    'app/views/home/'
]);

//new SessionSecure;

$params = ltrim($_GET['info'],'/');
$dir    = explode('/', $params);
$param  = (object)['dir'=>$dir[0]];

UrlParamsCompare::param(
    ['home','users'],
    $param->dir
);

switch($param->dir) {
    case 'home':
        $keys   = helper::homeKeys();
        $values = helper::homeValues();
        $file   = View::content('home');
    break;

    case 'users':
        $keys   = [];
        $values = [];
        $file   = View::content('users');
    break;

    default:
        $param->dir = 'Inicio';
        $info   = (object)['nombre' => 'maria', 'format' => 0];
        $list   = new GetListNameService(new GetListNameRepository);
        $keys   = helper::indexKeys();
        $values = helper::indexValues($list($info));
        $file   = View::content('index');
    break;
}

Layout::html(ucfirst($param->dir), str_replace($keys, $values, $file));

session_destroy();
Layout::header_location();