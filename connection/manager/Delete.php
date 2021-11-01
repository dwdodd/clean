<?php

class Delete
{
    public static function go($table ,$where, $id, $dbc=null)
    {
        if(empty($id)) return 5; /*Falta el identificador (id).*/

        try{
            $sql = "DELETE FROM $table WHERE $where = ?;";
            $response = $dbc->prepare($sql);
            $response->execute([$id]);

            if($response->rowCount()>0) return 1; /*Query ok.*/
            
            return 2; /* no hay resultados.*/
        }
        catch (\PDOException $e){
            return  3; /*La Llave dentro del array mal escrita*/
        }
    }
}