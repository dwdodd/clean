<?php

define('PATH_TO', '../../../');
require_once PATH_TO . 'resource/ClassLoader.php';

ClassLoader::run(['resource/', 'layout/']);

AppTemplate::app('Inicio - Dashboard', ComponentView::render('home'));

AppTemplate::header_location();