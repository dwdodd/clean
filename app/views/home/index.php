<?php

define('PATH_TO', '../../../');
require_once PATH_TO . 'resource/ClassLoader.php';

ClassLoader::run(['resource/', 'config/layout/']);

Layout::html('Inicio - Dashboard', ComponentView::render('home'));

Layout::header_location();