<?php

namespace Core;

use PDO;

class Database
{
    public PDO $pdo;
    
    public function __construct()
    {
        require_once "config.php";
        
        $host = DB_HOST;
        $db = DB_DATABASE;
        $user = DB_USERNAME;
        $pass = DB_PASSWORD;
        $charset = 'utf8mb4';
        
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }
    
    
    public function query(string $query, array $values = null)
    {
        if ($values)
        {
            $array = array_values($values);
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($array);
            return $stmt;
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}