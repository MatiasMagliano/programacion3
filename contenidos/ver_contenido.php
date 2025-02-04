<?php require_once 'utilidades/utils.php';
$conexion = conectar_base();
$res = sqlSelect(
    $conexion,
    "SELECT * FROM contenidos WHERE contenidos.id = ?",
    "i",
    $contenido_id
);

if ($res && $res->num_rows === 1) {
    $contenido = $res->fetch_assoc();

    // se buscan los desarrollos del contenido "contenido_id"
    $res_ddrr = sqlSelect(
        $conexion,
        "SELECT * FROM desarrollo WHERE desarrollo.id_contenido=?",
        "i",
        $contenido_id
    );

    if (($res_ddrr && $res_ddrr->num_rows > 0)) {
        while ($linea = $res_ddrr->fetch_assoc()) {
            $contenido["desarrollos"][] = $linea;
        }
    } else {
        $contenido["desarrollos"][] = [
            "letra_desarrollo"=> "SIN ASIGNAR",
            "titulo" => "SIN DESARROLLO",
            "desarrollo" => "SIN DESARROLLO"
        ];
    }
} else {
    echo "No se encontraron resultados";
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

    <!-- ESTILOS PROPIOS -->
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Bienvenidos a PROGRAMACION III</title>
</head>

<body class="container">

    <header class="bg-light py-4 text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">PROGRAMACIÓN III</h1>
            <h3 class="fw-bold titulo-contenido"><?= htmlspecialchars($contenido['titulo'], ENT_QUOTES) ?></h3>
            <p class="lead text-muted">Aquí encontrarán los temas de cada CONTENIDO y sus ADJUNTOS.</p>
        </div>
    </header>

    <main>
        <div class="card mt-5 mx-auto">
            <div class="card-header">
                <h4 class="fw-bold">Desarrollo de los temas</h4>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php
                    foreach ($contenido['desarrollos'] as $desarrollo) { 
                        $res_adj = sqlSelect(
                            $conexion,
                            "SELECT * FROM adjuntos WHERE adjuntos.id_desarrollo=?",
                            "i",
                            $desarrollo["id"]
                        ); ?>
                        <li class="list-group-item">
                            <h5><?= $desarrollo['letra_desarrollo'] ?> - <?= $desarrollo['titulo'] ?></h5>
                            <br>
                            <p><?= $desarrollo['desarrollo'] ?></p>                                
                        </li>
                        <!-- selección y enlistado de adjuntos -->
                        <?php if(($res_adj && $res_adj->num_rows > 0)){ ?>
                            <li class="list-group-item list-group-item-action active">
                                <h5>ADJUNTOS</h5>
                                <div class="contenedor-adjuntos">
                                    <?php while ($adjunto = $res_adj->fetch_assoc()) { ?>
                                        <div class="archivo">
                                            <h5><?= $adjunto['titulo'] ?></h5>
                                            <a href="/descargas/<?= base64_encode($adjunto['path'] . $adjunto['nombre']) ?>" target="_blank"
                                                rel="noopener noreferrer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                                                    class="bi bi-file-arrow-down" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 5a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5A.5.5 0 0 1 8 5" />
                                                    <path
                                                        d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1" />
                                                </svg>
                                            </a>
                                            <p>Tipo de archivo: <?php echo $adjunto['tipo']; ?></p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </li>
                        <?php }
                    } ?>
                </ul>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
    </main>

    <footer class="fixed-bottom bg-light text-center py-3">
        <div class="container">
            <p class="mb-0">2025 - Desarrollado por Matías J. Magliano para el IPET Nº363 - Monte Cristo, Córdoba,
                Argentina.</p>
        </div>
    </footer>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts.js"></script>

</body>

</html>