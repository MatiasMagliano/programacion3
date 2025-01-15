<?php
    require_once 'utilidades/utils.php';

    $conexion = conectar_base();

    $res = sqlSelect($conexion, 'SELECT * FROM users WHERE id=?', 'i', $_SESSION['userID']);
		if($res && $res->num_rows === 1) {
			$user = $res->fetch_assoc();
		}

    $conexion->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="csrf_token" content="<?=crearToken(); ?>" />
    <meta name="author" content="Matías Magliano">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP 5.0 -->
    <link rel="stylesheet" href="<?=dirname($_SERVER['PHP_SELF']) . '/css/bootstrap.min.css';?>">

    <!-- ESTILOS PROPIOS -->
    <link rel="stylesheet" href="<?=dirname($_SERVER['PHP_SELF']) . '/css/estilos.css';?>">
    <title>Bienvenidos a PROGRAMACION III</title>
</head>

<body class="container">

    <header class="bg-light py-4 text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">PROGRAMACIÓN III</h1>
            <p class="lead text-muted">HTML, CSS, Bootstrap 5, PHP v8.2, Laravel 11.x</p>
        </div>
    </header>

    <!-- NAV BAR -->
     <?php
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            echo '<div class="text-center"><a href="login.php">Iniciar sesión</a></div>';
        }
        else {  
            include "./utilidades/navbar.php";
        }
    ?>


    <main>

    </main>

    <footer class="fixed-bottom bg-light text-center py-3">
        <div class="container">
            <p class="mb-0">2025 - Desarrollado por Matías J. Magliano para el IPET Nº363 - Monte Cristo, Córdoba,
                Argentina.</p>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>

</body>

</html>