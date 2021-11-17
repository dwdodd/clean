<?php

require_once dirname(__DIR__).'/path.php';
require_once PATH_TO . 'autoload.php';

$param = trim($_GET['info'],'/');
resource\UrlParamsCompare::param(['/','value'], $param);

switch($param) {
    case 'value':
        exit("Dale valor...");
    break;
    
    default:
        $title = 'Inicio - Dashboard';
        $content = str_replace(
            '{{token}}',
            $_SESSION['token-access'],
            file_get_contents('content/home.php')
        );
    break;
}

app\layout\Template::app($title, $content);

app\layout\Template::header_location();