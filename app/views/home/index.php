<?php

define('PATH_TO', substr(dirname(__FILE__),0,22));
require_once PATH_TO . 'resource/ClassLoader.php';

use resource\{ClassLoader,ComponentView};
use layout\AppTemplate;
new ClassLoader;

$component = str_replace(
    ['{{token}}'],
    [$_SESSION['token-access']],
    ComponentView::render('home')
);

AppTemplate::app('Inicio - Dashboard', $component);
AppTemplate::header_location();