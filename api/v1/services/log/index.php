<?php

define('PATH_TO', substr(dirname(__FILE__),0,22));
require_once PATH_TO.'autoload.php';

switch (ltrim($_GET['info'],'/')) {
    case 'in':
        $_POST = json_decode(file_get_contents("php://input"), true);
        require_once PATH_TO . 'src/services/user/UserLoginService.php';
        require_once PATH_TO . 'resource/CryptoJsAes.php';

        if(@$_SESSION['token-csrf']){

            $_POST['correo'] = resource\CryptoJsAes::decrypt(@$_POST['correo']);
            $_POST['clave']  = resource\CryptoJsAes::decrypt(@$_POST['clave']);

            if($_SESSION['token-csrf'] != $_POST['token'])exit(json_encode([
                'code' => 3,
                'message' => 'Error no estas autorizado.'
            ]));

            new UserLoginService( (object)$_POST );
        }

        new UserLoginService( (object)$_POST );
    break;
    case 'out':
        session_destroy();
        resource\HeaderLocation::logout();
    break;
}