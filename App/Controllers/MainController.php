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
       
        $userToken = array($_COOKIE['remember_token'] ?? null);
        
        // Později můžeš zaobalit kdyby user měl SESSION:  if (Auth::user())
        if ($userToken[0] && $this->userObj->findUserToken($userToken)
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