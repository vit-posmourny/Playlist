<?php

namespace App\Controllers;

use Core\View;
use App\Models\User;
use App\Services\Auth;

class LoginController
{
    
    public User $userObj;
    
    // Tady budou jen hlášky, které se vrací ze serveru do PC
    public $errors =  [
        "wrong_email" => "Uživatel s tímto e-mailem nenalezen.",
        "wrong_password " => "Uživatel s tímto heslem nenalezen.",
    ];
    
    // KONSTRUKTOR
    public function __construct()
    {
        $this->userObj = new User();
    }
    
    
    public function showLogin()
    {
        $error = $_GET['error'] ?? null;
        
        // Kdyz by nemel token a odmazes ?? null co se stane
        if ($_COOKIE['remember_token'] ?? null)
        {
            header('location: /Playlist');
        }
        
        return View::render('login', [
            'title' => "Login",
            'error' => $this->errors[$error] ?? "",
        ]);
    }
    
    
    public function loginUser(array $data): void
    {
        if($user = $this->userObj->emailExists($data));
        {
            
            // vezmeme heslo z databáze (hash) a heslo z formuláře a proženeme to password_verify
            if (password_verify($data['password'], $user['password']))
            {
                die($data['checkbox']);
                if ($data['checkbox']) {
                    
                    $userToken = bin2hex(random_bytes(32));
                    // mozna zjistovat jestli operace probehla?
                    $this->userObj->setUserToken($data, $userToken);
                    
                    
                    Auth::login($user);
                    header('location: /Playlist');
                    
                } else {
                    
                    Auth::login($user);
                    header('location: /Playlist');
                }
                header('location: /Playlist/login?error=wrong_password');
            }
        } header('location: /Playlist/login?error=wrong_email');
    }
        
    
    
    public function logout()
    {
        Auth::logout();
    }
}