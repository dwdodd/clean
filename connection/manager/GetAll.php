<?php

class GetAll
{
    public static function go($table,$dbc=null)
    {
        try{
            $sql = "SELECT * FROM ".$table." order by 1;";
            $response = $dbc->query($sql);

            return $response->fetchAll(\PDO::FETCH_OBJ);
        }
        catch (\PDOException $e){
            return  3;
        }
    }
}