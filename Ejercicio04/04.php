<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contrasena'];
    $color = $_POST['color'];
    $publi = isset($_POST['publicidad']) ? 'no' : 'si publicidad';
    $idioma = isset($_POST['idiomas']);
    $estudios = $_POST['anio'];
    $ciudades = isset($_POST['ciudades']) ? implode(', ', $_POST['ciudades']) : 'No seleccionado';
    $comentario = $_POST['comentarios'];
    // Aquí puedes procesar los datos recibidos, por ejemplo, guardarlos en una base de datos o enviarlos por correo electrónico.
    echo "<pre>";
    echo "<h2>Datos recibidos:</h2>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Contraseña: $contraseña</p>";
    echo "<p>semaforo: $color</p>";
    echo "<p>Publicidad: $publi</p>";
    echo "<p>Idioma: $idioma</p>";
    echo "<p>Año fin de estudios: $estudios</p>";
    echo "<p>codigos postales de provincia: $ciudades</p>";
    echo "<p>Comentarios: $comentario</p>";
    echo "</pre>";

    }
?>