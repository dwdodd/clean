<?php

namespace connection\manager;

class Sanitize
{
    public function value($sanitize)
    {
        $sanitize = preg_replace("/[^\wáéíóúñäëïöüÁÉÍÓÚÑÄËÏÖÜ@$#!%-:;+,.\"\/\s]/",'',trim($sanitize));
        return html_entity_decode($sanitize);
    }
}