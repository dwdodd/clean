<?php

final class GetListNameRepository implements GetListNameInterface
{
    public function listName($info)
    {
        // $response = Update::go("app_usuarios",['nombre'=>'Gaylord','apellido'=>'Dodd'],'idusuario',432, new ConnMySql);
        // $response = Insert::go("app_usuarios",['nombre'=>'Gaylord','apellido'=>'Dodd'], new ConnMySql);
         $response = OpenQuery::go("select concat(nombre, ' ', apellido) as usuario, correo from app_usuarios where nombre like '%$info->nombre%'", $info->conn);
        // $response = GetAllById::go("app_usuarios",'idusuario', 68, new ConnMySql);
        // $response = GetAll::go("app_usuarios", new ConnMySql);
        // $response = GetSelectedColumnById::go("app_usuarios",['cv', 'telefono'],'idusuario', 412, new ConnMySql);
        // $response = OpenQuery::go("update app_usuarios set nombre='Galileo' where idusuario = 315", new ConnMySql);
        return !empty($response)?$response:$info;
    }
}