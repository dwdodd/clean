<?php

define('PATH_TO', substr(dirname(__FILE__),0,22));
require_once PATH_TO . 'src/services/user/GetUserListService.php';

$_GET['nombre'];
$_GET['location'] = 'external-request';
$_GET['request-code'] = 'ExternalCode32';
new GetUserListService( (object)@$_GET );