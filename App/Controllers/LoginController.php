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

        // Když bude mít platnej token, tak je přesměrován na playlist
        if ($userToken = $_COOKIE['remember_token'] ?? null)
        {
            if ($user = $this->userObj->validUserToken($userToken))
            {
                Auth::login($user);
                header('location: /Playlist/playlist');
            }
        }
        return View::render('login', [
            'title' => "Login",
            'error' => $this->errors[$error] ?? "",
        ]);
    }
        
    
    
    
    public function loginUser(array $data): void
    {

        $_SESSION['user_id'] = $this->userObj->getUserID($data);

        
        if ($this->userObj->emailExists($data))
        {
            // tohle v if($_SESSION['wrong_email'] = "") je vyhodnoceno jako NULL
            $_SESSION['wrong_email'] = "";
            
            $password = $this->userObj->getUserPassword($data);
            // vezmeme heslo z databáze (hash) a heslo z formuláře a proženeme to password_verify
            if (password_verify($data['password'], $password))
            {
                $_SESSION['wrong_password'] = "";
                
                if ($data['hidden-checkbox'] === 'true')
                {
                    
                    $userToken = bin2hex(random_bytes(32));
                    $user = $this->userObj->setUserToken($data, $userToken);
                    
                    Auth::login($user);
                    header('location: /Playlist/playlist');
                }
                else
                {
                    Auth::login($user);
                    header('location: /Playlist/playlist');
                }
            }
            else
            {
                // wrong_password
                $_SESSION['wrong_password'] = "Uživatel s tímto heslem nenalezen.";
                header('location: /Playlist/');
            }
        }
        else
        {
            // wrong_email
            $_SESSION['wrong_email'] = "Uživatel s tímto e-mailem nenalezen.";
            header('location: /Playlist/');
        }
    }
        
    
    
    public function logout()
    {
        Auth::logout();
        $this->showLogin();
    }
}