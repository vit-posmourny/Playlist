<?php

namespace App\Controllers;

use Core\View;
use App\Models\User;
use App\Services\Auth;

class RegisterController
{
    
    protected User $userObj;
    
    // Tady budou jen hlášky, které se vrací ze serveru do PC
    public $errors =  [
        "wrong_credentials" => "Špatné registrační údaje.",
        "user_exists" => "Uživatel s těmito údaji už v databázi existuje.",
    ];
    
    // KONSTRUKTOR
    public function __construct()
    {
        $this->userObj = new User();
    }
    
    
    public function showRegisterForm(): void
    {
        $error = $_GET['error'] ?? null;
        
        View::render('register', [
            'title' => "Registrace",
            'error' => $this->errors[$error] ?? "",
        ]);
    }
    
    
    public function registerUser($data)
    {
        // die(var_dump($data['email']));
        $isEmail = $this->userObj->emailExists($data['email']);
        
        if ($isEmail)
        {
            $_SESSION['email_exists'] = "Uživatel s tímto e-mailem již existuje.";
            header('location: /Playlist/register');
            
        } else {

            $user = $this->userObj->create($data);
            Auth::login($user);
            
            return header('location: /Playlist/');
        }
    }
}