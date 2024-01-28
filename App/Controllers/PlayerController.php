<?php

namespace App\Controllers;

use Core\View;
use App\Services\Auth;

class PlayerController
{
    
   
   
        public function index()
        {
           /*Později můžeš zaobalit kdyby user měl SESSION:  if (Auth::user()) {*/
                
                return View::render('Main');
            }
}