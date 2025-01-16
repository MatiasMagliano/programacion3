<?php
    require_once 'utils.php';

    if (isset($_POST['csrf_token']) && validarToken($_POST['csrf_token'])) {

        $conexion = conectar_base();

        if ($conexion) {
            $res = sqlUpdate($conexion, 'UPDATE contenidos SET fecha_publicacion=?', 's', '2099-01-01');

            if ($res !== -1)
                echo 0; // redirige al home
            else
                echo 1;
        } else
            echo 2;
    } else
        echo 3;