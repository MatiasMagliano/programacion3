<?php
    require_once 'utilidades/utils.php';

    $conexion = conectar_base();

    $items_front = mysqli_query($conexion, "SELECT * FROM contenidos WHERE tipo_contenido = 'front-end' ORDER BY nro_contenido");
    $items_back = mysqli_query($conexion, "SELECT * FROM contenidos WHERE tipo_contenido = 'back-end' ORDER BY nro_contenido");

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

        <div class="card mt-5" style="width: 100%;">
            <div class="card-header">
                <h1>FRONT-END</h1>
            </div>

            <div class="card-body">
                <div class="accordion" id="acordionFront">
                    <?php

                    foreach ($items_front as $item) {

                        $publicado = ($item["fecha_publicacion"] <= date("Y-m-d")) ? true : false;

                        $collapseId = 'collapse' . (string) $item["id"] . $item["nro_contenido"];
                        $headingId = 'heading' . (string) $item["id"] . $item["nro_contenido"];
                        ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="<?= $headingId; ?>">
                                <button class="accordion-button <?= $publicado ? '' : 'disabled'; ?>" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#<?= $collapseId; ?>" aria-expanded="true"
                                    aria-controls="<?= $collapseId; ?>" <?= $publicado ? '' : 'disabled'; ?>>
                                    <?php
                                    if ($publicado)
                                        echo $item["nro_contenido"] . " - " . $item["titulo"];
                                    else
                                        echo $item["nro_contenido"] . " - " . $item["titulo"] . " - <span class='text-danger'>PUBLICACIÓN NO DISPONIBLE TODAVÍA</span>";
                                    ?>
                                </button>
                            </h2>
                            <div id="<?= $collapseId; ?>" class="accordion-collapse collapse"
                                aria-labelledby="<?= $headingId; ?>" data-bs-parent="#acordionFront">
                                <div class="accordion-body">
                                    <strong><?= $item["titulo"]; ?></strong>
                                    <p><?= $item["referencia"]; ?></p>
                                    <a href="desarrollo.php?contenido=<?= $item["id"]; ?>" target="_blank"
                                        rel="noopener noreferrer">Ir a desarrollo</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="card mt-5" style="width: 100%;">
            <div class="card-header">
                <h1>BACK-END</h1>
            </div>

            <div class="card-body">
                <div class="accordion" id="acordionBack">
                    <?php

                    foreach ($items_back as $item) {

                        $publicado = ($item["fecha_publicacion"] <= date("Y-m-d")) ? true : false;

                        $collapseId = 'collapse' . (string) $item["id"] . $item["nro_contenido"];
                        $headingId = 'heading' . (string) $item["id"] . $item["nro_contenido"];
                        ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="<?= $headingId; ?>">
                                <button class="accordion-button <?= $publicado ? '' : 'disabled'; ?>" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#<?= $collapseId; ?>" aria-expanded="true"
                                    aria-controls="<?= $collapseId; ?>" <?= $publicado ? '' : 'disabled'; ?>>
                                    <?php
                                    if ($publicado)
                                        echo $item["nro_contenido"] . " - " . $item["titulo"];
                                    else
                                        echo $item["nro_contenido"] . " - " . $item["titulo"] . " - PUBLICACIÓN NO DISPONIBLE TODAVÍA";
                                    ?>
                                </button>
                            </h2>
                            <div id="<?= $collapseId; ?>" class="accordion-collapse collapse"
                                aria-labelledby="<?= $headingId; ?>" data-bs-parent="#acordionFront">
                                <div class="accordion-body">
                                    <strong><?= $item["titulo"]; ?></strong>
                                    <p><?= $item["referencia"]; ?></p>
                                    <a href="desarrollo.php?contenido=<?= $item["id"]; ?>" target="_blank"
                                        rel="noopener noreferrer">Ir a desarrollo</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        
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