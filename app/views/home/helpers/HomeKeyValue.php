<?php

namespace app\views\home\helpers;

class HomeKeyValue
{
    public static function key()
    {
        return [
            '{{token}}'
        ];
    }
    public static function value()
    {
        return [
            $_SESSION['token-access']
        ];
    }
}