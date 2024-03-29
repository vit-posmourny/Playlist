<?php
// session_status(). Tato funkce vrací stav aktuální session.
// Možné návratové hodnoty jsou:
// PHP_SESSION_DISABLED - pokud je session zakázána.
// PHP_SESSION_NONE - pokud session byla povolena, ale není spuštěna.
// PHP_SESSION_ACTIVE - pokud je session povolena a spuštěna.
// Tim, že každý request začíná zde, je výhodné umístit session_start() tady.

session_start();

    // Report all errors except E_WARNING
    error_reporting(E_ALL & ~E_WARNING);
    ini_set("display_errors", 1);
    
    require_once  "./autoload.php";
    require_once  "./web/routes.php";