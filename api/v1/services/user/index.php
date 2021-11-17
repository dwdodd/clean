<?php

define('PATH_TO', substr(dirname(__FILE__),0,22));
$_POST = json_decode(file_get_contents("php://input"), true);
require_once PATH_TO.'autoload.php';

switch (ltrim($_GET['info'],'/')) {
    case 'list':
        new src\user\services\GetUserListService( (object)$_POST );
    break;
    case 'create':
        new src\user\services\CreateUserService( (object)$_POST );
    break;
    default:
        exit('Error ID: <b>'.rand().'</b>');
    break;
}