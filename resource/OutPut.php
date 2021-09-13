<?php

class OutPut
{
    public static function format($format, $data)
    {
        if( self::returnTrue($format) ) return $data;
        self::diferentCode($format);
        self::inJson($format, $data);
        self::inText($format, $data);
    }

    private static function returnTrue($format)
    {
        if($format == 0) return true;
    }

    public static function diferentCode($format)
    {
        if((int)$format !== 1 && (int)$format !== 2) exit(json_encode([
            'code' => 3,
            'message' => 'Error de código: ('.$format.'), debe indicar el formato de salida correcto.',
            'example' => 'Códigos premitidos: 1 = json y 2 = text'
        ]));
    }

    private static function inJson($format, $data)
    {
        if((int)$format === 1) exit(json_encode($data));
    }

    private static function inText($format, $data)
    {
        if((int)$format === 2){
            echo "<pre>";
            print_r($data);
            echo "</pre>";
            exit;
        }
    }
}