<?php

namespace src\repositories\user;

use connection\ConnMySql;
use connection\manager\OpenQuery;
use src\contracts\GetListContract;

final class GetUserListRepository implements GetListContract
{
    public function getList($info)
    {
        return OpenQuery::go("select concat(nombre, ' ', apellido) as usuario, correo from app_usuarios where nombre like '%$info->nombre%'", new ConnMySql);
    }
}