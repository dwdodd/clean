<?php

define('PATH_TO', substr(dirname(__FILE__),0,22));
$_GET = json_decode(file_get_contents("php://input"), true);
require_once PATH_TO . 'src/user/services/GetUserListService.php';

new GetUserListService( (object)$_GET );