<?php
    use App\Controllers\MainController;
    use App\Controllers\LoginController;
    use App\Controllers\RegisterController;
    use App\Controllers\CroppieController;
    use App\Models\Playlist;
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

    $router->get("/Playlist/croppie", CroppieController::class, 'showCroppieDialog');


    //zjištění na jaké adrese
    $currentUrl = $_SERVER['REQUEST_METHOD'] . $_SERVER['REQUEST_URI'];

    //spusť metodu pro tuto URL na konkrétním kontroleru
    $router->dispatch($currentUrl);