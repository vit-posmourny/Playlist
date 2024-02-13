<?php

namespace Core;

class View
{
    public static function render($viewName, $data = null)
    {
        foreach ($data ?? [] as $variable_name => $variable)
        {
            $variable_name = $variable_name;
            $$variable_name = $variable;
        }
        
        return require_once "Views/" . $viewName . ".View.php";
    }
}