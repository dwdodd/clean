<?php

namespace connection\manager;

class Insert
{
    public static function go($table,$data=[],$dbc)
    {
        $fields = '';
        $values = '';
        $value_array = [];

        if(count($data) > 1){
            foreach($data as $key=>$value){
                $fields .= $key.',';
                if(empty($value)){
                    $value = 0;
                    $values .= $value.",~|~";
                }
                else{
                    $values .= $value.",~|~";
                }
            }

            $fields = substr($fields,0,-1);
            $values = substr($values,0,-4);
            $values = explode(',~|~',$values);
            
            foreach($values as $value_string){
                $value_string = str_replace($value_string,'?',$value_string);
                array_push($value_array,$value_string);
            }
            $new_value = implode(',',$value_array);
        }
        else{
            $values = [];
            foreach($data as $key=>$value){
                $fields = $key;
                $values = [$value];
            }
            $new_value = '?';
        }
        
        try{
            $sql = "INSERT INTO $table($fields)VALUES($new_value);";
            $response = $dbc->prepare($sql);
            $response->execute($values);
            $lid = $dbc->lastInsertId();

            return (object)[
                'code' => 1,
                'id' => $lid
            ]; /*Query ok*/
        }
        catch (\PDOException $e){
            return  3; /*La Llave dentro del array mal escrita*/
        }
    }
}