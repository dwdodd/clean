<?php

define('PATH_TO', '../../../');
require_once PATH_TO . 'src/test/GetListService.php';

use connection\ConnMySql;
use src\test\GetListRepository;

$_GET['conn'] = new ConnMySql;
$_GET['nombre'] ='edg';

$get = new GetListService(new GetListRepository);
$get( (object)@$_GET );