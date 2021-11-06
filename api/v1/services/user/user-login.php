<?php

define('PATH_TO', substr(dirname(__FILE__),0,22));
$_POST = json_decode(file_get_contents("php://input"), true);
require_once PATH_TO . 'src/services/user/UserLoginService.php';

if(@$_SESSION['token-csrf']){
    if($_SESSION['token-csrf'] != $_POST['token'])exit(json_encode([
        'code' => 3,
        'message' => 'Error no estas autorizado.'
    ]));
}

unset($_SESSION['token-csrf']);

new UserLoginService( (object)$_POST );