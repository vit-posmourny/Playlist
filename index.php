<?php

// Tim, že každý request začíná zde, je výhodné umístit session_start() tady.
session_start();

    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    require_once  "./autoload.php";
    require_once  "./web/routes.php";