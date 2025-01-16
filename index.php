<?php
    declare(strict_types=1);

    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    require "router.php";

    $router = new Router();

    // declaración de rutas
    $router->add("/", function(){
        echo "Página de inicio";
    });

    $router->add('/usuarios', function(){
        echo "Página de usuarios";
    });