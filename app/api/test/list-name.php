<?php

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
$get( (object)@$_GET );