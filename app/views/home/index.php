<?php

define('PATH_TO', substr(dirname(__FILE__),0,22));
require_once PATH_TO . 'autoload.php';

use app\views\home\helpers\HomeHook;
use app\layout\Template;

Template::app(
    'Inicio - Dashboard',
    str_replace(
        HomeHook::key(),
        HomeHook::value(),
        file_get_contents('content/home.php')
    )
);

Template::header_location();