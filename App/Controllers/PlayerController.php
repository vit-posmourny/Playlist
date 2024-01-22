<?php

namespace App\Controllers;

use Core\View;

class PlayerController
{
    public function index()
    {
        return View::render('MainView');
    }
}