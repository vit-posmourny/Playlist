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
        
        
        if($userToken = array($_COOKIE['remember_token'] ?? null))
        {
            $userData = $this->userObj->findUserToken($userToken);
            
            
            if ($userToken[0] && $userData['remember_token']) {
                Auth::login($userData);
                header('location: /Playlist');
            }
        }
        
        return View::render('login', [
            'title' => "Login",
            'error' => $this->errors[$error] ?? "",
        ]);
    }
    
    
    public function loginUser(array $data): void
    {
        // z formuláře nám přijde email a heslo
        // vezmeme email a najdeme usera a u něj zjistíme heslo
        $user = $this->userObj->emailExists($data['email']);
        
//        if(1)
        
            // vezmeme heslo z databáze (hash) a heslo z formuláře a proženeme to password_verify
            if (password_verify($data['password'], $user['password']))
            {
                
                
                if ($data['checkbox'])
                {
                    $userToken = bin2hex(random_bytes(32));
                    // mozna zjistovat jestli operace probehla?
                    $this->userObj->setUserToken($data['id'], $userToken);
                    
                    setcookie("remember_token", $userToken, time() + (86400 * 30), "/");
                    
                    Auth::login($user);
                    header('location: /Playlist');
                }
                else {
                    Auth::login($user);
                    header('location: /Playlist');
                }
            }
            header('location: /Playlist/login?error=wrong_password');
        
        header('location: /Playlist/login?error=wrong_email');
    }
        
    
    
    public function logout()
    {
        Auth::logout();
        return header('location: /Playlist/');
    }
    
}