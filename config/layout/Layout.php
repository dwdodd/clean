<?php

class Layout
{
    public static function html($title, $content)
    {
        // if(!isset($_SESSION)) session_start();
        // if(!isset($_SESSION['id-session'])) self::header_location();

        $top = str_replace(
            ['{{title}}', '{{host}}'],
            [$title, BaseUrl::url()],
            file_get_contents(PATH_TO . 'config/layout/html/begin.php')
        );

        $con = str_replace(
            ['{{host}}', '{{version}}'],
            [BaseUrl::url(), "?v=".rand()],
            $content
        );

        $footer = str_replace(
            ['{{host}}'],
            [BaseUrl::url()],
            file_get_contents(PATH_TO . 'config/layout/html/footer.php')
        );

        $end = str_replace(
            ['{{host}}', '{{version}}'],
            [BaseUrl::url(), "?v=".rand()],
            file_get_contents(PATH_TO . 'config/layout/html/bottom.php')
        );

        echo $top.$con.$footer.$end;
        exit;
    }

    public static function header_location()
    {
        session_destroy();
        return HeaderLocation::header_location();
    }
}