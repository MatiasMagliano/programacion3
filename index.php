<?php
    declare(strict_types=1);

    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    require "Router.php";

    $router = new Router();

    
    // DECLARACIÓN DEL middleware de autenticación "auth"
    $router->middleware('auth', function () {
        return isset($_SESSION['loggedin']) && $_SESSION['userID'] !== null;
    });



    // DECLARACIÓN DE RUTAS
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
    }, ['auth']);

    $router->add('/contenidos/{id}', function($id){
        echo "Esta es la página del contenido: $id";
    });

    $router->dispatch($path);