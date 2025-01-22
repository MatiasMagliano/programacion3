<?php
require_once 'utilidades/utils.php';

$conexion = conectar_base();

$res = sqlSelect($conexion, 'SELECT * FROM users WHERE id=?', 'i', $_SESSION['userID']);
if ($res && $res->num_rows === 1) {
    $user = $res->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="csrf_token" content="<?= crearToken(); ?>" />
    <meta name="author" content="Matías Magliano">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP 5.0 -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- ESTILOS PROPIOS -->
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Bienvenidos a PROGRAMACION III</title>
</head>

<body class="container">

    <header class="bg-light py-4 text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Borrar contenido</h1>
        </div>
    </header>

    <!-- NAV BAR -->
    <?php
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        echo '<div class="text-center"><a href="login.php">Iniciar sesión</a></div>';
    } else {
        include "./utilidades/navbar.php";
    }
    ?>

    <main class="text-center">
    <div id="errores" class="errorcontainer"></div>
        
        <form id="formBorrarContenido">
        <div class="card mt-5 mx-auto" style="width: 70%;">
            <div class="card-header">
                <h2>Borrado de contenido</h2>
            </div>
            <div class="card-body">
                <p class="text-danger">¿Está completamente seguro de borrar este contenido?</p>

                <div id="errores" class="errorcontainer"></div>
                
                <?php
                    $campos = [
                        0 => "id",
                        1=> "titulo as valor",
                    ];
                    echo crearSelect(
                        $conexion, 
                        "contenidos", 
                        $campos, 
                        "contenido_id", 
                        "Seleccione un contenido...");
                    $conexion->close();
                ?>
            </div>
            <div class="card-footer">
            <div class="w-10 btn btn-lg btn-danger" onclick="borrar_contenido();">Borrar</div>
            </div>
        </div>
        </form>
    </main>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts.js"></script>

</body>

</html>