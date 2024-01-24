<?php

namespace App\Controllers;

use Core\View;

class LoginController
{
    public function showLogin()
    {
        return View::render('login');
    }
    
}