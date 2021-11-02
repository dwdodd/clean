<?php

namespace connection\manager;

class Update
{
    public static function go($table,$data,$where,$id,$dbc=null)
    {
        $fields = '';
        $value_array = [];

        if(empty($id)) return 5; /*Falta el identificador (id).*/
        
        if(count($data) > 1){
            foreach($data as $key=>$value){
                $fields .= $key.'=?,';
                array_push($value_array,$value);
            }
            array_push($value_array,$id);
            $fields = substr($fields,0,-1);
        }
        else{
            foreach($data as $key=>$value){
                $fields = $key.'=?';
                array_push($value_array,$value);
            }
            array_push($value_array,$id);
        }

        try{
            $sql = "UPDATE $table SET $fields WHERE $table $where = ?;";
            $response = $dbc->prepare($sql);
            $response->execute($value_array);

            if($response->rowCount()>0) return 1; /*Query ok*/
            
            return 2; /* no hay resultados.*/
        }
        catch (\PDOException $e){
            return  3; /* Llave dentro del array mal escrita*/
        }
    }
}