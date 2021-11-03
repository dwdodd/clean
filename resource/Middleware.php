<?php

namespace resource;

class Middleware
{
    public static function request_location($location)
    {
        $location ? '' : exit(json_encode([
            'code' => 3,
            'message' => 'Falta el código de petición'
        ]));

        if(!in_array($location, ['internal-request', 'external-request'])) exit(json_encode([
            'code' => 3,
            'message' => "Clave de petición: ($location) errónea."
        ]));;

        switch($location){
            case 'internal-request':
                //if(!@$_SESSION) session_start();
                // if(!@$_SESSION['id-session']) exit(json_encode([
                //     'code' => 3,
                //     'message' => 'No estas autenticado'
                // ]));
            break;
            case 'external-request':
                if(!in_array($_GET['request-code'], ['ExternalCode32'])) exit(json_encode([
                    'code' => 3,
                    'message' => 'No estas autenticado'
                ]));
            break;
        }
    }
}