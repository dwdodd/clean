<?php

namespace src\user\repositories;

use connection\ConnMySql;
use connection\manager\{OpenQuery,Insert};

final class CreateUserRepository
{
    public function findEmail($info)
    {
        return OpenQuery::go("select correo from app_usuarios where correo = '$info'", new ConnMySql)->items[0];
    }

    public function save($info)
    {
        $data = [
            'nombre' => $info->nombre,
            'apellido' => $info->apellido,
            'correo' => $info->correo
        ];
        return Insert::go("app_usuarios", $data, new ConnMySql);
    }
}