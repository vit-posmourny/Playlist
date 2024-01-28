<?php

namespace App\Controllers;

use Core\View;
use App\Models\User;
use App\Services\Auth;

class LoginController
{
    
    public User $userModel;
    
    // Tady budou jen hlášky, které se vrací ze serveru do PC
    public $errors =  [
        "wrong_credentials" => "Špatné přihlašovací údaje.",
    ];
    
    // KONSTRUKTOR
    public function __construct()
    {
        $this->userModel = new User();
    }
    
    
    public function showLogin()
    {
        $error = $_GET['error'] ?? null;
        
        return View::render('login', [
            'title' => "Login",
            'error' => $this->errors[$error] ?? "",
        ]);
    }
    
    
    public function loginUser($data)
    {
        // z formuláře nám přijde email a heslo
        
        // vezmeme email a najdeme usera a u něj zjistíme heslo
        $user = $this->userModel->emailExists($data['email']);
        
        
        if ($user){
            
            // vezmeme heslo z databáze (hash) a heslo z formuláře a proženeme to password_verify
            if (password_verify($data['password'], $user['password']))
            {
                Auth::login($user['id']);
                 
                return header('location: /Playlist/');
                
            } else {
                
                return header('location: /Playlist/login?error=wrong_credentials');
            }
        } else {
            
            return header('location: /Playlist/login?error=wrong_credentials');
        }
    }
    
    
    public function logout()
    {
        Auth::logout();
        die('odhlasen');
        return header('location: /Playlist/');
    }
    
}