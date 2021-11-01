<?php

define('PATH_TO', '../../../');
require_once PATH_TO . 'src/test/GetListNameService.php';

$_GET['conn'] = new ConnMySql;

$get = new GetListNameService(new GetListNameRepository);
$get( (object)@$_GET, );