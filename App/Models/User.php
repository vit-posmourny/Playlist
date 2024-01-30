<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    protected $table = "users";
    
    public function create($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
        $token = bin2hex(random_bytes(32));
        
        $myData = array('email' => $data['email'], 'password' => $data['password'], 'remember_token' => $token);
        
        return $this->database->query("INSERT INTO $this->table (email, password, remember_token)
        VALUES (?, ?, ?)", $myData);
    }
    
    
    public function verifyToken()
    {
        return $this->database->query("SELECT 'remember_token' from $this->table where email = '$email'")[0];
    }
    
    public function emailExists($email)
    {
        return $this->database->query("SELECT * from $this->table where email = '$email'")[0];
    }
}