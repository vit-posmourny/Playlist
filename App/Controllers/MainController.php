<?php
namespace App\Controllers;

use App\Services\Auth;
use Core\View;
use App\Models\Playlist;
use App\Models\User;


class MainController
{
    protected Playlist $playlist;
    protected User $userObj;
    
    public function __construct()
    {
        $this->playlist = new Playlist();
        $this->userObj = new User();
    }
    
    
    public function Playlist()
    {
        return View::render('Main', [
            'title' => 'Playlist',
            'playlist' => $this->playlist->all(),
        ]);
    }
}


//__________________________________ BORDEL _______________________________________