<?php

namespace App\Services;

class Auth
{

    public static function login($user): void
    {
        $_SESSION['logout'] = FALSE;
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['remember_token'] = $user['remember_token'];
        setcookie('remember_token', $user['remember_token'], time() + (86400 * 30), "/");
    }

    public static function logout()
    {
        $_SESSION['logout'] = TRUE;
        unset($_COOKIE['remember_token']);  // musi to tu byt, jinak nedojde k vymazani z browseru
        setcookie('remember_token', '', 0, "/");
    }
}