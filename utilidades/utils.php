<?php
    require_once 'config.php';

    function conectar_base() {
        $conexion = new mysqli(NOMBRE_SERVIDOR, NOMBRE_USUARIO, CONTRASENIA, NOMBRE_BASE);

        // Check connection
        if ($conexion->connect_error){
            return false;
        }
        return $conexion;
    }

    function sqlSelect($conexion, $query, $format = false, ...$vars) {
		$stmt = $conexion->prepare($query);
		if($format) {
			$stmt->bind_param($format, ...$vars);
		}
		if($stmt->execute()) {
			$res = $stmt->get_result();
			$stmt->close();
			return $res;
		}
		$stmt->close();
		return false;
	}

    function sqlInsert($conexion, $query, $format = false, ...$vars) {
		$stmt = $conexion->prepare($query);
		if($format) {
			$stmt->bind_param($format, ...$vars);
		}
		if($stmt->execute()) {
			$id = $stmt->insert_id;
			$stmt->close();
			return $id;
		}
		$stmt->close();
		return -1;
	}

	function sqlUpdate($conexion, $query, $format = false, ...$vars) {
		$stmt = $conexion->prepare($query);
		if($format) {
			$stmt->bind_param($format, ...$vars);
		}
		if($stmt->execute()) {
			$stmt->close();
			return true;
		}
		$stmt->close();
		return false;
	}

    function crearToken() {
		$seed = urlSafeEncode(random_bytes(8));
		$t = time();
		$hash = urlSafeEncode(hash_hmac('sha256', session_id() . $seed . $t, CSRF_TOKEN_SECRET, true));
		return urlSafeEncode($hash . '|' . $seed . '|' . $t);
	}

    function validarToken($token) {
		$parts = explode('|', urlSafeDecode($token));
		if(count($parts) === 3) {
			$hash = hash_hmac('sha256', session_id() . $parts[1] . $parts[2], CSRF_TOKEN_SECRET, true);
			if(hash_equals($hash, urlSafeDecode($parts[0]))) {
				return true;
			}
		}
		return false;
	}

    function urlSafeEncode($m) {
		return rtrim(strtr(base64_encode($m), '+/', '-_'), '=');
	}

	function urlSafeDecode($m) {
		return base64_decode(strtr($m, '-_', '+/'));
	}

