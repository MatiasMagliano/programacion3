<?php
    $path_archivo = base64_decode($archivo);

    if (!file_exists($path_archivo)) {
        http_response_code(404);
        include "utilidades/404.php";
        exit;
    }

    // Obtener información del archivo
    $finfo = finfo_open(FILEINFO_MIME_TYPE); 
    $mimetype = finfo_file($finfo, $path_archivo);
    finfo_close($finfo);

    // Configurar encabezados para descarga
    header('Content-Type: ' . $mimetype);
    header('Content-Disposition: attachment; filename="' . basename($path_archivo) . '"');
    header('Content-Length: ' . filesize($path_archivo));

    // Leer y enviar el archivo al cliente
    readfile($path_archivo);
    //exit;