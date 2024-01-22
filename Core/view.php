<?php

namespace Core;

class View
{
    public static function render($viewName, $data = null)
    {
        $todos = $data;
        
        require_once "Views/" . $viewName . ".php";
    }
}