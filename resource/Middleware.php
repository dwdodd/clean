<?php

namespace resource;

class Middleware
{
    public static function request_location($location)
    {
        $location ? '' : exit(json_encode([
            'code' => 3,
            'message' => 'Falta la clave de petición'
        ]));

        if(!in_array($location, ['ir', 'er'])) exit(json_encode([
            'code' => 3,
            'message' => "Clave de petición: ($location) errónea."
        ]));

        switch($location){
            case 'ir':
                //if(!@$_SESSION) session_start();
                // if(!@$_SESSION['id-session']) exit(json_encode([
                //     'code' => 3,
                //     'message' => 'No estas autenticado'
                // ]));
            break;
            case 'er':
                if(!in_array($_GET['rtoken'], ['ExternalCode32'])) exit(json_encode([
                    'code' => 3,
                    'message' => 'No estas autenticado'
                ]));
            break;
        }
    }
}