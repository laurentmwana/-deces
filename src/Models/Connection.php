<?php


namespace App\Models;

use PDO;

class Connection {

    private static  string $USERNAME = "labeya";

    private static  string $PASS = "racheter";

    private static  string $HOST = "localhost";

    private static  string $DBNAME = "deces";

    private static $instance;



    /**
     * Retourne une instance de PDO
     *
     * @return PDO
     */
    static function getPDO (): PDO {

        return new PDO("mysql:host=localhost;dbname=deces", "root", "racheter", [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET UTF8",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS
        ]);
 
    }
}