<?php

define('PATH_TO', substr(dirname(__FILE__),0,22));
require_once PATH_TO . 'resource/ClassLoader.php';

use resource\{ClassLoader,ComponentView};
use app\views\home\helpers\HomeKeyValue;
use app\layout\Template;
new ClassLoader;

Template::app(
    'Inicio - Dashboard',
    str_replace(
        HomeKeyValue::key(),
        HomeKeyValue::value(),
        ComponentView::render('home')
    )
);

Template::header_location();