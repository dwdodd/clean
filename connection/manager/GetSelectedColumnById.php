<?php

namespace connection\manager;

class GetSelectedColumnById
{
    public static function go($table,$data,$where,$id,$dbc=null)
    {
        if(empty($id)) return 5; /*Falta el identificador (id).*/

        $fields = implode(',',$data);

        try{
            $dbc = $dbc;
            $sql = "SELECT $fields FROM $table WHERE $where = ?;";
            $response = $dbc->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);
            $response->execute([$id]);
            if($response->rowCount()>0) return $response->fetchAll(\PDO::FETCH_OBJ)[0];
            return [
                'code' => 2,
                'text' => 'No results'
            ];
        }
        catch (\PDOException $e){
            return  3; /* Llave dentro del array mal escrita*/
            exit;
        }
    }
}