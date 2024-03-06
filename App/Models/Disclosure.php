<?php

namespace App\Models;

use Core\Model;

class Disclosure extends Model
{
    protected $table = 'disclosure';
    
    public function getGenres(): array|false
    {
        $stmt = $this->database->query("SELECT genres FROM $this->table");
        return $stmt->fetchAll()[0];
    }
}