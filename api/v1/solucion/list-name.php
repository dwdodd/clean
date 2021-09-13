<?php

$reqUri = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));

$info  = (object)[
    'nombre' => @$reqUri[4],
    'format' => @$reqUri[5],
];

define('PATH_TO', '../../../');
require_once PATH_TO . 'resource/ClassLoader.php';

ClassLoader::run([
    'resource/',
    'connection/',
    'connection/manager/',
    'src/interface/',
    'src/test/'
]);

$get = new GetListNameService(new GetListNameRepository);
$get( $info );