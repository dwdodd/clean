<?php

namespace src\test;

use src\test\GetListInterface;
use connection\manager\OpenQuery;

final class GetListRepository implements GetListInterface
{
    public function list($info)
    {
        $response = OpenQuery::go("select concat(nombre, ' ', apellido) as usuario, correo from app_usuarios where nombre like '%$info->nombre%'", $info->conn);
        return $response;
    }
}