<?php

namespace src\user\services;

use resource\Middleware;
use src\user\repositories\CreateUserRepository;

final class CreateUserService
{
    public function __construct($info)
    {
        try{
            if($info){
                Middleware::token_access($info->token);

                $newUser = new CreateUserRepository;

                $find = $newUser->findEmail($info->correo);

                if(!empty($find)){
                    if($find->correo == $info->correo) exit(json_encode([
                        'code' => 3,
                        'message' => "Correo: $find->correo ya existe."
                    ]));
                }

                $response = $newUser->save($info);

                $response->nombre = $info->nombre;
                $response->apellido = $info->apellido;
                $response->correo = $info->correo;

                exit(json_encode(['data' => $response]));
            }
        }
        catch (\Throwable $th){ exit('Algo salio mal: ' . $th->getMessage()); }
    }
}