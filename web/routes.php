<?php
    use App\Controllers\PlayerController;
    use Core\Router;

    $router = new Router();

    // definice cest
  
    $router->addRoute("/Playlist/", PlayerController::class, 'index');

    $currentUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
//    echo $currentUrl."<br>";
    
    $router->dispatch($currentUrl);