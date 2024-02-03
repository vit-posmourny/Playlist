<?php

namespace App\Services;

class Auth
{
    public static function user()
    {
        return $_SESSION['user_id'];
    }
    

    public static function login($userData)
    {
        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['user_email'] = $userData['email'];
        $_SESSION['remember_token'] = $userData['remember_token'];
        setcookie('remember_token', $userData['remember_token'], time() + (86400 * 30), "/");
    }

    public static function logout()
    {
        setcookie('remember_token', time() - 3600);
        session_unset();
        session_destroy();
    }
}