<?php
require_once 'utils.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['csrf_token']) && validarToken($_POST['csrf_token'])) {
	if (
		isset($_POST['tipo_contenido']) && isset($_POST['nro_contenido']) && isset($_POST['titulo'])
		&& isset($_POST['fecha_publicacion']) && isset($_POST['referencia'])
	) {

		$tipo_contenido = $_POST['tipo_contenido'];
		$nro_contenido = $_POST['nro_contenido'];
		$titulo = $_POST['titulo'];
		$fecha_publicacion = $_POST['fecha_publicacion'];
		$referencia = $_POST['referencia'];

		$conexion = conectar_base();

		if ($conexion) {
			$transaccion = sqlUpdate(
				$conexion,
				'INSERT INTO contenidos VALUES (NULL, ?, ?, ?, ?, ?)',
				'sisss',
				$tipo_contenido,
				$nro_contenido,
				$titulo,
				$fecha_publicacion,
				$referencia
			);
			if ($transaccion)
				// redirección a la página de inicio
				echo 0;
			else
				// error de inserción de bbdd
				echo 1;
		} else
			// errror de conexión de base de datos
			echo 2;
	} else
		// error de campos vacíos
		echo 3;
} else
	// error método o de permisos
	echo 4;