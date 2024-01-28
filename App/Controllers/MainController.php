<?php

namespace App\Controllers;

use Core\View;
use App\Models\Playlist;

class MainController
{
    protected Playlist $playlist;
    
    public function __construct()
    {
        $this->playlist = new Playlist();
    }
    
   
    public function index()
    {
        // Později můžeš zaobalit kdyby user měl SESSION:  if (Auth::user())
       
        return View::render('Main', [
            
            'title' => 'Playlist',
            'playlist' => $this->playlist->all(),
        ]);
    }
}