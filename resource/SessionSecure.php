<?php

namespace resource;

use resource\HeaderLocation;

class SessionSecure
{
    public function __construct()
    {
        if(!@$_SESSION) session_start();

        if(!@$_SESSION['id-session']) {
            session_destroy();
            HeaderLocation::header_location();
            exit;
        };
    }
}
new SessionSecure;