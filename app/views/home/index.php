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

$param = GetUrl::param($_GET['info']);

UrlParamsCompare::param(
    ['home','users'],
    $param->view
);

switch($param->view) {
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
        $param->view = 'Inicio';
        $info   = (object)['nombre' => 'maria', 'format' => 0];
        $list   = new GetListNameService(new GetListNameRepository);
        $keys   = helper::indexKeys();
        $values = helper::indexValues($list($info));
        $file   = View::content('index');
    break;
}

Layout::html(ucfirst($param->view), str_replace($keys, $values, $file));

session_destroy();
Layout::header_location();