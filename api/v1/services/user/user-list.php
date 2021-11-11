<?php

define('PATH_TO', substr(dirname(__FILE__),0,22));
$_GET = json_decode(file_get_contents("php://input"), true);
require_once PATH_TO . 'autoload.php';

new src\user\services\GetUserListService( (object)$_GET );