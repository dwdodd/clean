<?php

namespace src\repositories\user;

use connection\ConnMySql;
use connection\manager\OpenQuery;
use src\contracts\GetLoginContract;

final class UserLoginRepository implements GetLoginContract
{
    public function login($info)
    {
        $clave = md5($info->clave);
        return OpenQuery::go("select * from app_usuarios where correo = '$info->correo' and clave = '$clave'", new ConnMySql)->items[0];
    }
}