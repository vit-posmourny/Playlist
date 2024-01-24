<?php
    use App\Controllers\PlayerController;
    use App\Controllers\LoginController;
    use App\Controllers\RegisterController;
    use Core\Router;

    $router = new Router();

    // definice cest

    $router->get("/Playlist/", PlayerController::class, 'index');

    $router->get("/Playlist/register", RegisterController::class, 'showRegisterForm');
    $router->post("Playlist/register", RegisterController::class, 'registerUser');
    
    $router->get("/Playlist/login", LoginController::class, 'showLogin');
    $router->post("/Playlist/login", LoginController::class, 'loginUser');

    $currentUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
//    echo $currentUrl."<br>";

//zjištění na jaké adrese
$currentUrl = $_SERVER['REQUEST_METHOD'] . $_SERVER['REQUEST_URI'];
$currentUrl = parse_url($currentUrl)['path'];


//spusť metodu pro tuto URL na konkrétním kontroleru
$router->dispatch($currentUrl);