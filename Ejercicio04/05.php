<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensaje = '';
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];  
    $hobbiesArray = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];
    $hobbies = implode(', ', $hobbiesArray);
    if ($edad == 'mayor55' && $sexo == 'hombre') {
        $mensaje = 'bienvenido Don ' . $nombre . ' ' . $apellidos;
    } else if ($edad == 'mayor55' && $sexo == 'mujer') {
        $mensaje = 'bienvenida Doña ' . $nombre . ' ' . $apellidos;
    } else {
        $mensaje = 'bienvenido/a ' . $nombre . ' ' . $apellidos;
    }

    if (count($hobbiesArray) == 0) {
        $mensaje .= ' no tiene aficiones de nuestra lista';
    } else if (count($hobbiesArray) == 1) {
        $mensaje .= ' su unica afición es: ' . $hobbies;
    } else {
        $mensaje .= ' sus aficiones son: ' . $hobbies;
    }
    echo "<h2>Datos recibidos:</h2>";
    echo "<p>$mensaje</p>";



}
?>