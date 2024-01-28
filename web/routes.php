<?php
    use App\Controllers\MainController;
    use App\Controllers\LoginController;
    use App\Controllers\RegisterController;
    use Core\Router;

    $router = new Router();

    // definice cest

    $router->get("/Playlist/", MainController::class, 'index');

    $router->get("/Playlist/register", RegisterController::class, 'showRegisterForm');
    $router->post("/Playlist/register", RegisterController::class, 'registerUser');
    
    $router->get("/Playlist/login", LoginController::class, 'showLogin');
    $router->post("/Playlist/login", LoginController::class, 'loginUser');
    $router->get("/Playlist/login/logout/", LoginController::class, 'logout');
    
    
    //zjištění na jaké adrese
    $currentUrl = $_SERVER['REQUEST_METHOD'] . $_SERVER['REQUEST_URI'];
//    echo $currentUrl;
    $currentUrl = parse_url($currentUrl)['path'];
    
    
    //spusť metodu pro tuto URL na konkrétním kontroleru
    $router->dispatch($currentUrl);