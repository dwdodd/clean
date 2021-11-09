<?php

namespace resource;

class Middleware
{
    public static function token_access($token)
    {
        $token ? '' : exit(json_encode([
            'code' => 3,
            'message' => 'Acceso no permitido'
        ]));

        if(!in_array($token, [@$_SESSION['token-access']])) exit(json_encode([
            'code' => 3,
            'message' => 'No estas autenticado'
        ]));
    }
}