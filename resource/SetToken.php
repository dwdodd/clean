<?php

namespace resource;

class SetToken
{
    public static function token()
    {
        return substr(str_shuffle('1234567890abcdefghijklmnopqrstuxyzABCDEFGHIJKLMNOPQRSTUXYZ'),0,12).\resource\Encrypt::datum('encrypt','tlt'.(time()+24*60*60));
    }
}