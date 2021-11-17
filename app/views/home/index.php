<?php

define('PATH_TO', substr(dirname(__FILE__),0,22));
require_once PATH_TO . 'autoload.php';

resource\UrlParamsCompare::param(['/','home'],$_GET['info']);

$content = str_replace(
    '{{token}}',
    $_SESSION['token-access'],
    file_get_contents('content/home.php')
);

app\layout\Template::app('Inicio - Dashboard', $content);

app\layout\Template::header_location();