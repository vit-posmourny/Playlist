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
        $data['remember_token'] = $token;

        $stmt = $this->database->query("INSERT INTO $this->table (email, password, remember_token)
        VALUES (?, ?, ?)", $data);

        if (!$stmt)
        {
            return false;
        }
        return $this->getUser($data['email']);
    }
    
    
    
    public function getUser($email): false|array
    {
        $email = array($email);
        $stmt = $this->database->query("SELECT * FROM $this->table WHERE email = ?", $email);
        
        if (!$stmt)
        {
            return false;    
        }
        return $stmt->fetch();
    }
    
    
    
    public function emailExists($email): bool
    {
        $assocArr['email'] = $email;
        
        $stmt = $this->database->query("SELECT email FROM $this->table WHERE email = ?", $assocArr);
        
        if ($result = $stmt->fetch())
        {
            return true;
        }
        return $result;
    }
    
    
    
    public function getUserID($data): int|false
    {
        $assocArr['email'] = $data['email'];
        //die(var_dump($assocArr));
        $stmt = $this->database->query("SELECT id FROM $this->table WHERE email = ?", $assocArr);
        $result = $stmt->fetch();

        if ($result)
            return $result['id'];
        else
            return $result;
    }
    
    
    public function getUserPassword($data): string|false
    {
        $assocArr['email'] = $data['email'];
        
        $stmt = $this->database->query("SELECT password FROM $this->table WHERE email = ?", $assocArr);

        return $stmt->fetch()['password'];
    }
    
    
    public function validUserToken($userToken): array|false
    {
        $assocArr['remember_token'] = $userToken;
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
        else
        {
            return false;
        }
    }
}
?>