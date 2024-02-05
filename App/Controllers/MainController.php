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
    
    
    public function index()
    {
        // Co kdyz tam nedam ?? null
        if ($userTokenArr = array($_COOKIE['remember_token'] ?? null))
        {
            $user = $this->userObj->findUserToken($userTokenArr);
            
            if ($userTokenArr[0] && $user['remember_token'])
            {
                Auth::login($user);
                
                return View::render('Main', [
                    'title' => 'Playlist',
                    'playlist' => $this->playlist->all(),
                ]);
                
            } else {
                
                header('location: /Playlist/login');
            }
            
        } header('location: /Playlist/login');
    }
}

//__________________________________ BORDEL _______________________________________