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
        
        $stmt = $this->database->query("SELECT * FROM " . $this->table . " WHERE email = ?", $assocArr);
        
        if ($stmt->fetch()['email'] === $data['email'])
        {
            return true;
        }
        return false;
    }
    
    
    public function getUserPassword($data): string|false
    {
        $assocArr = array('email' => $data['email']);
        
        $stmt = $this->database->query("SELECT password FROM " . $this->table . " WHERE email = ?", $assocArr);
        
        return $stmt->fetch()['password'];
    }
    
    
    public function validUserToken($userToken): array|false
    {
        $assocArr = array('remember_token' => $userToken);
        $stmt = $this->database->query("SELECT * FROM $this->table WHERE remember_token = ?", $assocArr);
        return $stmt->fetch();
    }
    
    

    public function setUserToken($data, $userToken): array|false
    {
        
        $assocArr = array('remember_token' => $userToken, 'email' => $data['email']);
        
        $result = $this->database->query("UPDATE $this->table SET remember_token = ? WHERE email = ?", $assocArr);
        
        if ($result) {
            
            $user = $data;
            $user += ['remember_token' => $userToken];
            
            return $user;
        }
        else {
            return false;
        }
    }
}