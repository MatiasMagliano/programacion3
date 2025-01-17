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
    <link rel="stylesheet" href="/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/summernote-lite.min.css">

    <!-- ESTILOS PROPIOS -->
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Bienvenidos a PROGRAMACION III</title>
</head>

<body class="container">

    <header class="bg-light py-4 text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Nuevo contenido</h1>
        </div>
    </header>

    <!-- NAV BAR -->
    <?php
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        echo '<div class="text-center"><a href="login.php">Iniciar sesión</a></div>';
    } else {
        include base_path('navbar.php', 'utilidades', true);
    }
    ?>


    <main class="my-5">
        <form id="formNuevoContenido">
            <h1 class="h3 mb-3 fw-normal">Nuevo contenido de la cátedra</h1>

            <div id="errores" class="errorcontainer"></div>

            <div class="row my-3">
                <div class="col">
                    <label for="tipo_contenido">Tipo de contenido *</label>
                    <select class="form-select" name="tipo_contenido" id="tipo_contenido" required>
                        <option selected></option>
                        <option value="front-end">FRONT-END</option>
                        <option value="back-end">BACK-END</option>
                    </select>
                </div>
                <div class="col">
                    <label for="nro_contenido">Número de orden *</label>
                    <input type="text" name="nro_contenido" id="nro_contenido"
                        onkeydown="if(event.key === 'Enter'){event.preventDefault();nuevo_contenido();}"
                        class="form-control" required>
                </div>
            </div>

            <div class="row my-3">
                <div class="col">
                    <label for="titulo">Título del contenido *</label>
                    <input type="text" name="titulo" id="titulo"
                        onkeydown="if(event.key === 'Enter'){event.preventDefault();nuevo_contenido();}"
                        class="form-control" required>
                </div>
                <div class="col">
                    <label for="fecha_publicacion">Fecha de publicación *</label>
                    <input type="date" name="fecha_publicacion" id="fecha_publicacion"
                        onkeydown="if(event.key === 'Enter'){event.preventDefault();nuevo_contenido();}"
                        class="form-control" required>
                </div>
            </div>

            <div class="my-3">
                <label for="contenido">Texto del contenido *</label>
                <textarea id="contenido" name="contenido" required></textarea>
            </div>
        </form>
    </main>

    <footer class="fixed-bottom bg-light text-center py-3">
        <div class="container">
            <p class="mb-0">2025 - Desarrollado por Matías J. Magliano para el IPET Nº363 - Monte Cristo, Córdoba,
                Argentina.</p>
        </div>
    </footer>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/summernote-lite.min.js"></script>
    <script src="/js/scripts.js"></script>
    <script>
        $('#contenido').summernote({
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>

</body>

</html>