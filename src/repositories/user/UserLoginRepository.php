<?php

namespace src\repositories\user;

use connection\ConnMySql;
use connection\manager\OpenQuery;

final class UserLoginRepository
{
    public function verifyCredential($info)
    {
        $clave = md5($info->clave);
        return OpenQuery::go("select * from app_usuarios where correo = '$info->correo' and clave = '$clave'", new ConnMySql)->items[0];
    }
}