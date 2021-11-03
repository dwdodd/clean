<?php

define('PATH_TO', substr(dirname(__FILE__),0,22));
require_once PATH_TO . 'resource/ClassLoader.php';

use resource\{ClassLoader,ComponentView};
use layout\AppTemplate;
new ClassLoader;

AppTemplate::app('Inicio - Dashboard', ComponentView::render('home'));
AppTemplate::header_location();