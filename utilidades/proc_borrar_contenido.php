<?php
require_once 'utils.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['csrf_token']) && validarToken($_POST['csrf_token'])) {
    if (isset($_POST['contenido'])) {
        
        $id_contenido = $_POST['contenido_id'];

        $conexion = conectar_base();

        // ACTUALIZAR EL SCRIPT SQL!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        if ($conexion) {
            $res = sqlUpdate($conexion, 'UPDATE contenidos SET fecha_publicacion=? WHERE id=?', 'si', date('Y-m-d'), $id_contenido);

            if ($res !== -1)
                echo 0; // redirige al home
            else
                echo 2;
        } else
            echo 2;
    } else {
        echo '3'; // complete los campos requeridos
    }
} else {
    echo '4';
}