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

        $token_arr = array('remember_token' => $token);
        $data = array_push($data, $token_arr);
        
        return $this->database->query("INSERT INTO $this->table (email, password, remember_token)
        VALUES (?, ?, ?)", $data);
    }
    
    
    public function emailExists($data)
    {
        $assocArr = array('email' => $data['email']);

        $stmt = $this->database->query("SELECT * FROM ".$this->table." WHERE email = ?", $assocArr);
        
        return $stmt->fetch();
    }
    
    
    public function findUserToken(array $userToken): false|array|\PDOStatement
    {
        $stmt = $this->database->query("SELECT * FROM $this->table WHERE remember_token = ?", $userToken);
        return $stmt->fetch();
    }
    
    

    public function setUserToken($userToken, $data)
    {
        $assocArr = array('remember_token' => $userToken, 'email' => $data['email']);
        
        $this->database->query("UPDATE $this->table SET remember_token = ? WHERE id = ?", $assocArr);
    }
}