<?php

session_start();
session_destroy();
define('PATH_TO', substr(dirname(__FILE__),0,22));
require_once PATH_TO.'resource/ClassLoader.php';
new resource\ClassLoader;
resource\HeaderLocation::logout();