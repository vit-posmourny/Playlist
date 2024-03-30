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


    public function getInterpretersByGenre($genre): array|false
    {
        
        die(print_r($genre));
        $stmt = $this->database->query("SELECT interpret FROM $this->table WHERE genres = ?", $genre);
        return $stmt->fetchAll()[0];
    }
}