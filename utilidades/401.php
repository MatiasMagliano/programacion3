<?php
    require_once 'utilidades/utils.php';
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
    <main>
        <div class="custom-bg text-dark">
            <div class="d-flex align-items-center justify-content-center min-vh-100 px-2">
                <div class="text-center">
                    <h1 class="display-1 fw-bold">401</h1>
                    <p class="fs-2 fw-medium mt-4">¡No autorizado!</p>
                    <p class="mt-4 mb-5">La página que usted busca requiere autenticación.</p>
                    <a href="/" class="btn btn-light fw-semibold rounded-pill px-4 py-2 custom-btn">
                        Inicio
                    </a>
                </div>
            </div>
        </div>
    </main>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>