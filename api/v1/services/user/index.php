<?php

require_once dirname(__DIR__).'/path.php';
require_once PATH_TO.'autoload.php';

$_POST = json_decode(file_get_contents("php://input"), true);

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