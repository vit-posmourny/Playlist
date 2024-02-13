<?php

namespace App\Services;

class Auth
{
    public static function user()
    {
        return $_SESSION['user_id'];
    }
    

    public static function login($user): void
    {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        // koukni do $SESSION jestli uklada
        $_SESSION['remember_token'] = $user['remember_token'];
        setcookie('remember_token', $user['remember_token'], time() + (86400 * 30), "/");
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
        // musi t0 tu byt, jinak nedojde k vymazani z browseru
        unset($_COOKIE['remember_token']);
        setcookie('remember_token', '', 0, "/");
    }
}