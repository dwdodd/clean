<?php

define('PATH_TO', substr(dirname(__FILE__),0,22));
$_POST = json_decode(file_get_contents("php://input"), true);
require_once PATH_TO . 'src/services/user/UserLoginService.php';

new UserLoginService( (object)$_POST );