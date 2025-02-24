<?php

    // PHP.

    define("BASEDIR", str_replace("\\", "/", dirname(__FILE__, 2)) . "/");

    // SQL.

    $_ENV["database"]["host"] = "localhost:3306";
    
    $_ENV["database"]["user"] = "root";

    $_ENV["database"]["password"] = "";

    $_ENV["database"]["db_name"] = "db_controle_gastos_residenciais";

?>