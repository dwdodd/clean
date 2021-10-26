<?php

class IndexHelper
{
    public static function keys()
    {
        return ['{{listName}}'];
    }

    public static function values($items=null)
    {
        if($items->items !== 0){
            $content = '';
            foreach($items->items as $item) $content .= "<b>Usuario</b>: $item->usuario <br><b>Correo</b>: $item->correo <br><br>";
            return [$content];
        }
        return '';
    }
}