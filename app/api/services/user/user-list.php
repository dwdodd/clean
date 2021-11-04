<?php

define('PATH_TO', substr(dirname(__FILE__),0,22));
require_once PATH_TO . 'src/services/user/GetUserListService.php';

$_GET['nombre'] = '';
$_GET['location'] = 'ir';
new GetUserListService( (object)@$_GET );