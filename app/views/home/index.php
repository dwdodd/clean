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
    'app/views/home/helper/keyValue/'
]);

//new SessionSecure;

$param = GetUrl::param($_GET['info']);

UrlParamsCompare::param(
    ['evento'],
    $param->view
);

switch($param->view) {
    case 'evento':
        $keys   = EventHelper::keys();
        $values = EventHelper::values();
        $component = ComponentView::render('event');
    break;

    default:
        $param->view = 'Inicio';
        $info = (object)['nombre' => 'maria', 'format' => 0];
        $list = new GetListNameService(new GetListNameRepository);
        $keys = IndexHelper::keys();
        $values = IndexHelper::values($list($info));
        $component = ComponentView::render('index');
    break;
}

Layout::html(ucfirst($param->view), str_replace($keys, $values, $component));

session_destroy();
Layout::header_location();