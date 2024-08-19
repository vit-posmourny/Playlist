<?php

namespace App\Models;

use Core\Model;


class Playlist extends Model
{
    protected $table = 'music';
    
    public function getInterpretersByGenre($genre): array|false
    {
        $stmt = $this->database->query("SELECT interpret FROM $this->table WHERE genres = ?", $genre);
        return $stmt->fetchAll()[0];
    }
}