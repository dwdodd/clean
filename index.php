<?php

require_once 'resource/ClassLoader.php';
ClassLoader::run(['resource/','layout/']);
IndexTemplate::index();