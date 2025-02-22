<?php
    declare(strict_types=1);

    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    require "Router.php";
    require_once "utilidades/utils.php";

    $router = new Router();

    
    // DECLARACIÓN DEL middleware de autenticación "auth"
    $router->middleware('auth', function () {
        return isset($_SESSION['loggedin']) && $_SESSION['userID'] !== null; //  
    });



    // DECLARACIÓN DE RUTAS
    $router->add("/", function(){
        include "landing.php";
    });

    $router->add('/login', function(){
        include "login.php";
    });

    $router->add('/logout', function(){
        include "utilidades/salir.php";
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

    $router->add('/contenidos/borrar_contenido', function(){
        include "contenidos/borrar_contenido.php";
    }, ['auth']);

    // Ruta para ver el contenido + desarrollo + adjuntos.
    $router->add('/contenidos/{id}', function($id){
        $contenido_id = $id;
        include 'contenidos/ver_contenido.php'; 
    });

    // Ruta para descarga de los adjuntos.
    $router->add('/descargas/{archivo}', function($archivo){
        include 'utilidades/descargar_adjuntos.php';
    });

    $router->dispatch($path);