<?php

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

            return (object)[
                'items' => !empty($items)?$items:0,
                'id' => !empty($id)?$id:0
            ];
        }
        catch (\PDOException $e){
            return  3; /* 'Error en la consulta.'*/;
        }
    }
}