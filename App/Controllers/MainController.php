<?php
namespace App\Controllers;

use App\Services\Auth;
use Core\View;
use App\Models\Playlist;
use App\Models\User;
use App\Models\Disclosure;

class MainController
{
    protected Disclosure $disclosure;
    protected Playlist $playlist;
    protected User $userObj;

    public function __construct()
    {
        $this->disclosure = new Disclosure();
        $this->playlist = new Playlist();
        $this->userObj = new User();
    }


    
    public function Playlist()
    {
        //die(var_dump($this->disclosure->getGenres()));
        return View::render('Main', [
            'title' => 'Playlist',
            'playlist' => $this->playlist->all(),
            'assocArrayOfGenres' => $this->disclosure->getGenres(),
        ]);
    }
}

//__________________________________ BORDEL _______________________________________