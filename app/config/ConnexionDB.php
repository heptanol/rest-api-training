<?php

namespace App\Config;
/**
 * Il faut mettre en place votre config mysql
 *
 * Class ConnexionDB
 * @package App\Config
 */
class ConnexionDB {

    private static $_db = null;
    private static $_instance = null;
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const DB_HOST = '';
    const DB_NAME = 'formation_articles';
    const DBMS_PORT = '';

    public function __construct()
    {
        $dsn = sprintf( 'mysql:dbname=%s;host=%s', self::DB_NAME, self::DB_HOST);
        self::$_db = new \PDO($dsn, self::DB_USER, self::DB_PASSWORD);
    }

    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new ConnexionDB();
        }
        return self::$_db;
    }
}