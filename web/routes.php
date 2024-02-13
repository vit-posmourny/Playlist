<?php
    use App\Controllers\MainController;
    use App\Controllers\LoginController;
    use App\Controllers\RegisterController;
    use Core\Router;

    $router = new Router();

    // definice cest

    $router->get("/Playlist/", LoginController::class, 'showLogin');
    $router->get("/Playlist/login/logout", LoginController::class, 'logout');
    $router->post("/Playlist/login", LoginController::class, 'loginUser');

    $router->get("/Playlist/playlist", MainController::class, 'Playlist');
    $router->post("/Playlist/playlist", MainController::class, 'Playlist');
    
    $router->get("/Playlist/register", RegisterController::class, 'showRegisterForm');
    $router->post("/Playlist/register", RegisterController::class, 'registerUser');



    //zjištění na jaké adrese
    $currentUrl = $_SERVER['REQUEST_METHOD'] . $_SERVER['REQUEST_URI'];
    // die($_SERVER['REQUEST_METHOD']);
    // die($_SERVER['REQUEST_URI']);
    // die($currentUrl);
    // $currentUrl = parse_url($currentUrl)['path'];
    
    //spusť metodu pro tuto URL na konkrétním kontroleru
    $router->dispatch($currentUrl);