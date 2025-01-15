<?php
    require_once 'utilidades/utils.php';

    // $conexion = conectar_base();

    // $hash = password_hash('mmagliano', PASSWORD_DEFAULT);
    // $id = sqlInsert($conexion, 'INSERT INTO users VALUES (NULL, ?, ?, ?, 0)', 'sss', 'Matías Magliano', 'magliano.matias@gmail.com', $hash);
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

    <title>Ingresar a PROGRAMACION III</title>

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
    </style>
</head>

<body class="text-center">
    <main class="form-signin">
        <form id="formularioLogin">
            <h1 class="h3 mb-3 fw-normal">Ingresar</h1>

            <div id="errores" class="errorcontainer"></div>

            <div class="form-floating">
                <input id="email" name="email" type="email" onkeydown="if(event.key === 'Enter'){event.preventDefault();login();}"
                    class="form-control" autocomplete="email" placeholder="Nombre de usuario" required />
                <label for="email">Nombre de usuario</label>
            </div>

            <div class="form-floating">
                <input id="password" name="password" type="password" onkeydown="if(event.key === 'Enter'){event.preventDefault();login();}"
                    class="form-control" autocomplete="current-password" placeholder="Contraseña" required/>
                <label for="password">Contraseña</label>
            </div>

            <div class="w-100 btn btn-lg btn-primary" onclick="login();">Ingresar</div>
        </form>
    </main>

    <script src="./js/scripts.js"></script>
</body>

</html>