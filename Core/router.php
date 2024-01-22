<?php

namespace Core;
    
    class Router
    {
        private $routes = [];
        
        // Přidává novou trasu do routovacího systému
        public function addRoute($url, $controller, $method)
        {
            $this->routes[$url] = ['controller' => $controller, 'method' => $method];
            
        }
        
        // Zpracovává aktuální URL a volá příslušný kontroler a metodu
        public function dispatch($url)
        {
            // Ověření existence trasy pro dané URL
            if (array_key_exists($url, $this->routes)) {
                $route = $this->routes[$url];
                
                // Získání názvu kontroleru a metody
                $controllerName = $route['controller'];
                $methodName = $route['method'];
                
                // Vytvoření instance kontroleru
                $controller = new $controllerName();

                // $controller->$methodName();
                $controller->index();
                
            } else {
                
                echo "404 Not Found";
            }
        }
        
    }