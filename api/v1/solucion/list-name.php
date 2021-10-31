<?php

$reqUri = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));

$info  = (object)[
    'nombre' => @$reqUri[5],
    'format' => @$reqUri[6],
];

define('PATH_TO', '../../../');
require_once PATH_TO . 'src/test/GetListNameService.php';

if($info->format == 0) OutPut::diferentCode($info->format);

$get = new GetListNameService(new GetListNameRepository);
$get( $info );