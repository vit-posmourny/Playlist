<?php
namespace App\Controllers;
use App\Services\Auth;
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
      if (Auth::user())
      {
            return View::render('Main', [
                
                'title' => 'Playlist',
                'playlist' => $this->playlist->all(),
            ]);
      }
      else {
        
        return header('location: /Playlist/login');
      }
    }
}