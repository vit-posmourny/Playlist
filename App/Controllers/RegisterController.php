<?php

namespace App\Controllers;

class RegisterController
{
    
    public User $userModel;
    
    public $errors =  [
        "wrong_credentials" => "Špatné registrovací údaje",
        "user_exists" => "Uživatel s těmito údaji už v databázi existuje.",
    ];
    
    public function __construct()
    {
        $this->userModel = new User();
    }
    
    public function showRegisterForm(): View
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
            //stopnu registeraci a vrátím ho zpět na registrační formulář s chybou
            return header('location: /todoapp-implement_model-2/register?error=user_exists');
        } else {
            //provedu registraci / vytvořím záznám v tabulce users
            $this->userModel->create($data);
            $registered_user = $this->userModel->emailExists($data['email']);
            Auth::login($registered_user['id']);
            
            
            return header('location: /todoapp-implement_model-2/');
        }
    }
}