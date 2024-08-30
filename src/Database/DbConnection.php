<?php

namespace App\Database;

use PDO;
use PDOException;

class DbConnection
{

    private static $instance;

    private $pdo;

    public function __construct()
    {

        try {
            $dsn = 'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME') . ';charset=utf8';

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $this->pdo = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASS'), $options);

        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }

    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }

}
