<?php

define('PATH_TO', '../../../');
require_once PATH_TO . 'src/test/GetListService.php';

use connection\ConnMySql;
use src\test\GetListNameRepository;

$_GET['conn'] = new ConnMySql;
$_GET['nombre'] ='mar';

$get = new GetListService(new GetListRepository);
$get( (object)@$_GET );