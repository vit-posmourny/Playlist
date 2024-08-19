<?php

namespace App\Models;

use Core\Model;



class Disclosure extends Model
{
    protected $table = 'disclosure';
    
    public function ajax_getGenres()
    {
        $stmt = $this->database->query("SELECT genres FROM $this->table");
        return json_encode($stmt->fetchAll()[0]);
    }
    
    public function getGenres()
    {
        $stmt = $this->database->query("SELECT genres FROM $this->table");
        return $stmt->fetchAll()[0];
    }
}