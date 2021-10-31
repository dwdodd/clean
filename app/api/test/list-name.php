<?php

define('PATH_TO', '../../../');
require_once PATH_TO . 'src/test/GetListNameService.php';

$get = new GetListNameService(new GetListNameRepository);
$get( (object)@$_GET );