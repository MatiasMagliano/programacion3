<?php
    declare(strict_types=1);

    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    require "Router.php";

    $router = new Router();

    // declaración de rutas
    $router->add("/", function(){
        include "landing.php";
    });

    $router->add('/login', function(){
        include "login.php";
    });

    $router->add('/publicar_contenido', function(){
        include "publicar_contenido.php";
    });

    $router->add('/reiniciar_anio', function(){
        include "reiniciar_anio.php";
    });

    $router->add('/contenidos/nuevo_contenido', function(){
        include "contenidos/nuevo_contenido.php";
    });

    $router->dispatch($path);