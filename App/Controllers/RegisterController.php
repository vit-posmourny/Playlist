<?php

namespace App\Controllers;

use Core\View;
use App\Models\User;
use App\Services\Auth;

class RegisterController
{
    
    public User $userModel;
    
    // Tady budou jen hlášky, které se vrací ze serveru do PC
    public $errors =  [
        "wrong_credentials" => "Špatné registrační údaje.",
        "user_exists" => "Uživatel s těmito údaji už v databázi existuje.",
    ];
    
    // KONSTRUKTOR
    public function __construct()
    {
        $this->userModel = new User();
    }
    
    
    public function showRegisterForm()
    {
        $error = $_GET['error'] ?? null;
        
        return View::render('register', [
            'title' => "Registrace",
            'error' => $this->errors[$error] ?? "",
        ]);
    }
    
    
    public function registerUser($data)
    {
        $user = $this->userModel->emailExists($data['email']);
        
        if ($user) {
           
            return header('location: /Playlist/register?error=user_exists');
            
        } else {
          
            $this->userModel->create($data);
            $registered_user = $this->userModel->emailExists($data['email']);
            
            Auth::login($registered_user);
            
            return header('location: /Playlist/');
        }
    }
}