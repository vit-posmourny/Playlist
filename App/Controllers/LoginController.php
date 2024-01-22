<?php

namespace App\Controllers;

use Core\View;

class LoginController
{
    public function index()
    {
        return View::render('loginView');
    }
}