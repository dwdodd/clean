<?php

class QueryManager
{
    public function insert($table,$data=[],$dbc=null)
    {
        $fields = '';
        $values = '';
        $value_array = [];

        if(count($data) > 1){
            foreach($data as $key=>$value){
                $fields .= $key.',';
                $values .= $value.",~|~";
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
            $sql = "INSERT INTO ".$table."(".$fields.")VALUES(".$new_value.");";
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

    public function update($table,$data,$where,$id,$dbc=null)
    {
        $fields = '';
        $value_array = [];

        if(empty($id)){
            return 5; /*Falta el identificador (id).*/
        }
        
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
            $sql = "UPDATE ".$table." SET ".$fields." WHERE ".$table.".$where = ?;";
            $response = $dbc->prepare($sql);
            $response->execute($value_array);

            if($response->rowCount()>0) return 1; /*Query ok*/
            
            return 2; /* no hay resultados.*/
        }
        catch (\PDOException $e){
            return  3; /* Llave dentro del array mal escrita*/
        }
    }

    public function getAll($table,$dbc=null)
    {
        try{
            $sql = "SELECT * FROM ".$table.";";
            $response = $dbc->query($sql);

            return $response->fetchAll(\PDO::FETCH_OBJ);
        }
        catch (\PDOException $e){
            return  3;
        }
    }

    public function getAllById($table,$where,$id,$dbc=null)
    {
        if(empty($id)){
            return 5; /*Falta el identificador (id).*/
        }

        try{
            $sql = "SELECT * FROM ".$table." WHERE $where = ?;";

            //$response = $dbc->prepare($sql);
            $response = $dbc->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);

            $response->execute([$id]);
            
            if($response->rowCount()>0) return $response->fetchAll(\PDO::FETCH_OBJ)[0];
            
            return 2; /* no hay resultados.*/
        }
        catch (\PDOException $e){
            return  3; /* Llave dentro del array mal escrita*/
        }
    }

    public function getSelectedColumnById($table,$data,$where,$id,$dbc=null)
    {
        if(empty($id)){
            return 5; /*Falta el identificador (id).*/
        }

        $fields = implode(',',$data);

        try{
            $dbc = $dbc;
            $sql = "SELECT ".$fields." FROM ".$table." WHERE $where = ?;";

            //$response = $dbc->prepare($sql);
            $response = $dbc->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);

            $response->execute([$id]);
            
            if($response->rowCount()>0) return $response->fetchAll(\PDO::FETCH_OBJ)[0];
            
            return 2; /* no hay resultados.*/
        }
        catch (\PDOException $e){
            return  3; /* Llave dentro del array mal escrita*/
            exit;
        }
    }

    public function delete($table ,$where, $id, $dbc=null)
    {
        if(empty($id)){
            return 5; /*Falta el identificador (id).*/
        }

        try{
            $sql = "DELETE FROM ".$table." WHERE $where = ?;";
            $response = $dbc->prepare($sql);
            $response->execute([$id]);

            if($response->rowCount()>0) return 1; /*Query ok.*/
            
            return 2; /* no hay resultados.*/
        }
        catch (\PDOException $e){
            return  3; /*La Llave dentro del array mal escrita*/
        }
    }

    public function openquery($openquery,$dbc=null)
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

    public function openquery_pagination($openquery,$dbc=null)
    {
        try{
            $verbs = ['delete','drop','update','alter','create','describe'];

            foreach( $verbs as $verb ){
                $compare = strpos(strtolower($openquery), strtolower($verb));
                if( $compare !== false ){
                    exit(json_encode([400,'Error', 'El método ::openquery() no puede ser utilizado para: (delete, drop, update, alter, create o describe)', 'Exiten métodos para delete y update en: (db/qmp/) ::update(), ::delete()']));
                }
            }

            $response = $dbc->query($openquery);

            return (object) [
                'data' => $response->fetchAll(\PDO::FETCH_OBJ),
                'rows' => $response->rowCount()
            ];
        }
        catch (\PDOException $e){
            return  3; /* 'Error en la consulta.'*/;
        }
    }

    public function sanitize($sanitize)
    {
        $sanitize = preg_replace("/[^\wáéíóúñäëïöüÁÉÍÓÚÑÄËÏÖÜ@$#!%-:;+,.\"\/\s]/",'',trim($sanitize));
        return html_entity_decode($sanitize);
    }
}