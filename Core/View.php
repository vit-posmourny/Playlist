<?php

namespace Core;

class View
{
    public static function render($viewName, $data = null)
    {
        foreach ($data ?? [] as $variable_name => $variable)
        {
            $variable_name = $variable_name; // co ten radek vymazat?
            $$variable_name = $variable;
        }
        
        require_once "Views/" . $viewName . ".View.php";
    }
}