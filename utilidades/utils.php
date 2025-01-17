<?php
require_once 'config.php';

function conectar_base()
{
	$conexion = new mysqli(NOMBRE_SERVIDOR, NOMBRE_USUARIO, CONTRASENIA, NOMBRE_BASE);

	// Check connection
	if ($conexion->connect_error) {
		return false;
	}
	return $conexion;
}

function sqlSelect($conexion, $query, $format = false, ...$vars)
{
	$stmt = $conexion->prepare($query);
	if ($format) {
		$stmt->bind_param($format, ...$vars);
	}
	if ($stmt->execute()) {
		$res = $stmt->get_result();
		$stmt->close();
		return $res;
	}
	$stmt->close();
	return false;
}

function sqlInsert($conexion, $query, $format = false, ...$vars)
{
	$stmt = $conexion->prepare($query);
	if ($format) {
		$stmt->bind_param($format, ...$vars);
	}
	if ($stmt->execute()) {
		$id = $stmt->insert_id;
		$stmt->close();
		return $id;
	}
	$stmt->close();
	return -1;
}

function sqlUpdate($conexion, $query, $format = false, ...$vars)
{
	$stmt = $conexion->prepare($query);
	if ($format) {
		$stmt->bind_param($format, ...$vars);
	}
	if ($stmt->execute()) {
		$stmt->close();
		return true;
	}
	$stmt->close();
	return false;
}

function crearToken()
{
	$seed = urlSafeEncode(random_bytes(8));
	$t = time();
	$hash = urlSafeEncode(hash_hmac('sha256', session_id() . $seed . $t, CSRF_TOKEN_SECRET, true));
	return urlSafeEncode($hash . '|' . $seed . '|' . $t);
}

function validarToken($token)
{
	$parts = explode('|', urlSafeDecode($token));
	if (count($parts) === 3) {
		$hash = hash_hmac('sha256', session_id() . $parts[1] . $parts[2], CSRF_TOKEN_SECRET, true);
		if (hash_equals($hash, urlSafeDecode($parts[0]))) {
			return true;
		}
	}
	return false;
}

function urlSafeEncode($m)
{
	return rtrim(strtr(base64_encode($m), '+/', '-_'), '=');
}

function urlSafeDecode($m)
{
	return base64_decode(strtr($m, '-_', '+/'));
}

/**
 * @param int $number
 * @return string
 */
function romano($number) {
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}

function crearSelect($conexion, $tabla, $campos, $id_select, $default = 'Seleccione una opción')
{
	$sql = 'SELECT ';

	// Iterar sobre los campos y construir la parte SELECT de la consulta
	foreach ($campos as $campo) {
		$sql .= $campo . ', ';
	}

	// Eliminar la última coma y espacio sobrantes
	$sql = rtrim($sql, ", ");

	// Completar la consulta con el resto de la cláusula FROM y AS
	$sql .= ' FROM ' . $tabla . ' ORDER BY id';

	// se ejecuta la consulta
	$contenidos = sqlSelect($conexion, $sql);

	// se crea array temporal con las opciones
	$opciones = '';
	foreach ($contenidos as $contenido) {
		$opciones .= '<option value="' . $contenido['id'] . '">' . $contenido['valor'] . '</option>';
	}

	// se devuelve el select
	return 
		'<select id="' . $id_select . '" name="' . $id_select . '" 
		class="form-select"> <option value="">' . $default . '</option>' . $opciones . '</select>';
}

function redirect($url) {
    header('Location: '.$url);
    die();
}

function base_path($archivo, $carpeta = '', $relativo = false) {
    if ($relativo) {
		$ruta = $carpeta . '/' . $archivo;
	} else {
		$ruta = '/' . $carpeta . '/' . $archivo;
	}

    return $ruta;
}