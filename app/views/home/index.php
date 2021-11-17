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
        $content = \resource\Document::content(
            '{{token}}',
            $_SESSION['token-access'],
            'home'
        );
    break;
}

app\layout\Template::app($title, $content);
app\layout\Template::header_location();