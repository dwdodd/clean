<?php

namespace app\views\home\helpers;

class HomeHook
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