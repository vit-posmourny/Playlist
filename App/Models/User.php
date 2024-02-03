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
    
    
    public function emailExists($email): false|array|\PDOStatement
    {
        return $this->database->query("SELECT * FROM $this->table WHERE email = $email");
        /*die(var_dump($arr));*/
    }
    
    
    public function findUserToken(array $userToken): false|array|\PDOStatement
    {
        $stmp = $this->database->query("SELECT * FROM $this->table WHERE remember_token = ?", $userToken);
        
        $resultArr = array();
        foreach ($stmp as $item)
        {
            array_push($resultArr, $item);
        }
        
        return $resultArr[0];
    }
    
    

    public function setUserToken($userToken, $user_id)
    {
        $arr = array($userToken, $user_id);
        return $this->database->query("UPDATE $this->table SET remember_token = ? WHERE id = ?", $arr);
    }
}