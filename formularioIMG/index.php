<?php
// Si la petición es GET, mostramos el formulario HTML
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include('captura.html');
    exit;
}

// Si la petición es POST, procesamos los datos
$nombre = isset($_POST['nombre']) ? htmlspecialchars(trim($_POST['nombre']), ENT_QUOTES, 'UTF-8') : '';
$alias = isset($_POST['alias']) ? htmlspecialchars(trim($_POST['alias']), ENT_QUOTES, 'UTF-8') : '';
$edad = isset($_POST['edad']) ? intval($_POST['edad']) : 0;
$armas = isset($_POST['armas']) ? $_POST['armas'] : [];
$magia = isset($_POST['magia']) ? htmlspecialchars($_POST['magia'], ENT_QUOTES, 'UTF-8') : 'No';

$armas_texto = !empty($armas) ? implode(', ', $armas) : 'Ninguna';

// Variables para el control de la imagen
$imagen_subida_exitosamente = false;
$error_imagen = false;
$ruta_imagen_final = '';
$mensaje_error_subida = '';

// Verificar si se ha enviado un archivo de imagen
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] !== UPLOAD_ERR_NO_FILE) {
    $archivo = $_FILES['imagen'];
    
    // Comprobar errores de subida
    if ($archivo['error'] === UPLOAD_ERR_OK) {
        // Validar tamaño (máximo 10 KB = 10240 bytes)
        $tamano_valido = $archivo['size'] <= 5242880;
        
        // Validar tipo MIME o extensión PNG
        $extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
        $tipo_mime = mime_content_type($archivo['tmp_name']);
        $tipo_valido = ($extension === 'png' && $tipo_mime === 'image/png');

        if ($tamano_valido && $tipo_valido) {
            $nombre_archivo_seguro = uniqid('img_', true) . '.png';
            $ruta_destino = 'uploads/' . $nombre_archivo_seguro;
            
            if (move_uploaded_file($archivo['tmp_name'], $ruta_destino)) {
                $imagen_subida_exitosamente = true;
                $ruta_imagen_final = $ruta_destino;
            } else {
                $error_imagen = true;
                $mensaje_error_subida = 'Error al subir la imagen';
            }
        } else {
            $error_imagen = true;
            $mensaje_error_subida = 'Error al subir la imagen';
        }
    } else {
        $error_imagen = true;
        $mensaje_error_subida = 'Error al subir la imagen';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos del Jugador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #9598b0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .result-container {
            background-color: #ffff00;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            width: 550px;
            position: relative;
        }
        h2 {
            text-align: center;
            font-family: monospace;
            margin-top: 0;
        }
        .content-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .info-section {
            flex: 1;
            padding-right: 20px;
        }
        .image-section {
            width: 200px;
            text-align: center;
        }
        .image-box {
            border: 1px solid #000080;
            background-color: #ffffff;
            width: 180px;
            height: 180px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            margin-bottom: 5px;
        }
        .image-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        .error-text {
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="result-container">
    <h2>Datos del Jugador</h2>
    
    <div class="content-wrapper">
        <div class="info-section">
            <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
            <p><strong>Alias:</strong> <?php echo $alias; ?></p>
            <p><strong>Edad:</strong> <?php echo $edad; ?></p>
            <p><strong>Armas seleccionadas:</strong> <?php echo $armas_texto; ?></p>
            <p><strong>¿Practica artes mágicas?:</strong> <?php echo $magia; ?></p>
        </div>
        
        <div class="image-section">
            <?php if ($imagen_subida_exitosamente): ?>
                <p style="font-weight: bold;">Imagen subida:</p>
                <div class="image-box">
                    <img src="<?php echo $ruta_imagen_final; ?>" alt="Imagen del jugador">
                </div>
            <?php elseif ($error_imagen): ?>
                <p style="font-weight: bold;">No se subió ninguna imagen.</p>
                <div class="image-box">
                    <img src="calavera.png" alt="Calavera">
                </div>
                <div class="error-text"><?php echo $mensaje_error_subida; ?></div>
            <?php else: ?>
                <!-- No se indicó ninguna imagen (se muestra la calavera sin mensaje de error, tal como indica la práctica) -->
                <div class="image-box" style="margin-top: 35px;">
                    <img src="calavera.png" alt="Calavera">
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>