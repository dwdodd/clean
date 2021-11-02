<?php

define('PATH_TO', '../../../');
require_once PATH_TO . 'src/services/GetListService.php';

$_GET['nombre'] = '';

new GetListService( (object)@$_GET );