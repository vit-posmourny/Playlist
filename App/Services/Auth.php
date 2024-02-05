<?php

namespace App\Services;

class Auth
{
    public static function user()
    {
        return $_SESSION['user_id'];
    }
    

    public static function login($user)
    {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['remember_token'] = $user['remember_token'];
        setcookie('remember_token', $user['remember_token'], time() + (86400 * 30), "/");
    }

    public static function logout()
    {
        setcookie('remember_token', time() - 10000);
        session_unset();
        session_destroy();
        setcookie('remember_token', '', 0, "/");
    }
}