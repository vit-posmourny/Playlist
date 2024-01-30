<?php

namespace App\Services;

class Auth
{
    public static function user()
    {
//      return verifyToken($data);
        return $_SESSION['user_id'];
    }
    

    public static function login($user)
    {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['remember_token'] = $user['remember_token'];
        // tohle jsem drive daval nad <body> na main a nebo na login - mozna to je cesta,
        // zde to asi ani nema byt
        setcookie('remember_token', $_SESSION['remember_token'], time() + (86400 * 30), "/"); // 86400 = 1 day
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
    }
}