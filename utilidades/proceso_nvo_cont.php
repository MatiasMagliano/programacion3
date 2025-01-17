<?php
	require_once 'utils.php';
	
	if(isset($_POST['tipo_contenido']) && isset($_POST['nro_contenido']) && isset($_POST['titulo'])
        && isset($_POST['fecha_publicacion']) && isset($_POST['contenido']) && isset($_POST['csrf_token'])
        && validarToken($_POST['csrf_token'])) {
            
		$tipo_contenido = $_POST['tipo_contenido'];
		$nro_contenido = $_POST['nro_contenido'];
        $titulo = $_POST['titulo'];
		$fecha_publicacion = $_POST['fecha_publicacion'];
        $contenido = $_POST['contenido'];

		$conexion = conectar_base();

		if($conexion) {
            // INSERT en la base de datos
        }
		else
			echo 2;
	}
	else
		echo 1;