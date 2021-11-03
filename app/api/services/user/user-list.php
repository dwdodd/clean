<?php

define('PATH_TO', substr(dirname(__FILE__),0,22));
require_once PATH_TO . 'src/services/user/GetUserListService.php';

$_GET['nombre'] = '';
new GetUserListService( (object)@$_GET );