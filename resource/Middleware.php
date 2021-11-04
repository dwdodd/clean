<?php

namespace resource;

class Middleware
{
    public static function token_access($token)
    {
        $token ? '' : exit(json_encode([
            'code' => 3,
            'message' => 'Falta el token'
        ]));

        if(!@$_SESSION) session_start();
        if(!in_array($token, [@$_SESSION['token-access']])) exit(json_encode([
            'code' => 3,
            'message' => 'No estas autenticado'
        ]));
    }
}