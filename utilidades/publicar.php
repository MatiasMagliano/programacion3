<?php
    require_once 'utils.php';

    if (isset($_POST['contenido']) && isset($_POST['csrf_token']) && validarToken($_POST['csrf_token'])) {
        $id_contenido = $_POST['contenido'];

        $conexion = conectar_base();

        if ($conexion) {
            $res = sqlUpdate($conexion, 'UPDATE contenidos SET fecha_publicacion=? WHERE id=?', 'si', date('Y-m-d'), $id_contenido);

            if ($res !== -1)
                echo 0; // redirige al home
            else
                echo 2;
        } else
            echo 2;
    } else
        echo 3;
