<?php

class helper
{
    public static function homeKeys()
    {
        return ['{{event}}'];
    }

    public static function homeValues()
    {
        return ['Esto es un evento.'];
    }

    public static function indexKeys()
    {
        return ['{{listName}}'];
    }

    public static function indexValues($items=null)
    {
        if($items->items !== 0){
            $content = '';
            foreach($items->items as $item) $content .= "<b>Usuario</b>: $item->usuario <br><b>Correo</b>: $item->correo <br><br>";
            return [$content];
        }
        return '';
    }
}
