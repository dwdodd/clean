<?php

namespace connection\manager;

class OpenQuery
{
    public static function go($openquery,$dbc=null)
    {
        try{
            $verbs = ['delete','drop','alter','create','describe'];

            foreach( $verbs as $verb ){
                $compare = strpos(strtolower($openquery), strtolower($verb));
                if( $compare !== false ){
                    exit(json_encode([400,'Error', 'El método ::openquery() no puede ser utilizado para: (delete, drop, alter, create o describe)', 'Exiten métodos para delete y update en: (db/qmp/) ::update(), ::delete()']));
                }
            }

            $response = $dbc->query($openquery);
            $items = $response->fetchAll(\PDO::FETCH_OBJ);
            $id = $dbc->lastInsertId();

            if(empty($id)) return (object)['items'=>!empty($items)?$items:false];
            return (object)[
                'items' => !empty($items)?$items:false,
                'id' => !empty($id)?$id:false
            ];
        }
        catch (\PDOException $e){
            return  3; /* 'Error en la consulta.'*/;
        }
    }
}