<?php

namespace src\user\repositories;

use connection\ConnMySql;
use connection\manager\OpenQuery;

final class GetUserListRepository
{
    public function list()
    {
        return OpenQuery::go("select concat(nombre, ' ', apellido) as usuario, correo from app_usuarios", new ConnMySql);
    }
}