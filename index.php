<?php

require_once 'resource/ClassLoader.php';

use resource\ClassLoader;
use layout\IndexTemplate;

ClassLoader::run();
IndexTemplate::index();