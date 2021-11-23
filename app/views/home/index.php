<?php

require_once dirname(__DIR__).'/path.php';

use \resource\{UrlParamsCompare, Document};
use app\layout\Template;

$param = trim($_GET['info'],'/');
UrlParamsCompare::param(['value'], $param);

switch($param) {
    case 'value':
        exit("Dale valor...");
    break;
    
    default:
        $title = 'Inicio - Dashboard';
        $content = Document::content('{{token}}', $_SESSION['token-access'], 'home');
    break;
}

Template::app($title, $content);
Template::header_location();