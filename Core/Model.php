<?php

namespace Core;

class Model
{
    protected Database $database;
    protected $table;
    
    public function __construct()
    {
        $this->database = new Database();
    }
    
    public function all()
    {
        $stmt = $this->database->query("SELECT * FROM $this->table");
        return $stmt->fetchAll();
    }
    
    public function find(int $id): array
    {
        return $this->database->query("SELECT * FROM $this->table where id = $id");
    }
}