<?php

namespace src\repositories;

use connection\ConnMySql;
use connection\manager\OpenQuery;
use src\contracts\GetListContract;

final class GetListRepository implements GetListContract
{
    public function list($info)
    {
        return OpenQuery::go("select concat(nombre, ' ', apellido) as usuario, correo from app_usuarios where nombre like '%$info->nombre%'", new ConnMySql);
    }
}