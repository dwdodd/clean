<?php

require_once PATH_TO . 'resource/ClassLoader.php';
use resource\{ClassLoader, SetToken};
use src\repositories\user\UserLoginRepository;
new ClassLoader;

final class UserLoginService
{
    public function __construct($info)
    {
        try{
            if($info){
                $repository = new UserLoginRepository;
                $response = $repository->verifyCredential($info);

                if(!$response) exit(json_encode([
                    'code' => 3,
                    'message' => 'Error en usuario ó contraseña'
                ]));

                $response->token = SetToken::token();
                $_SESSION['token-access'] = $response->token;
                $_SESSION['id-session']   = session_id();
                exit(json_encode(['code' => 1,'data' => $response]));
            }
        }
        catch (\Throwable $th){ exit('Algo salio mal: ' . $th->getMessage()); }
    }
}