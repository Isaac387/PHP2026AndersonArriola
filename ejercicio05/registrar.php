<?php
$mensaje = "";
$error = false;
function validarPassword($password)
{
    if (strlen($password) < 8) {
        return [
            "valido" => false,
            "mensaje" => "La contraseña debe tener al menos 8 caracteres"
        ];
    } elseif (!preg_match('/[a-z]/', $password)) {
        return ["valido" => false, "mensaje" => "Falta una minúscula"];
    } elseif (!preg_match('/[A-Z]/', $password)) {
        return ["valido" => false, "mensaje" => "Falta una mayúscula"];
    } elseif (!preg_match('/[0-9]/', $password)) {
        return ["valido" => false, "mensaje" => "Falta un número"];
    } elseif (!preg_match('/[^a-zA-Z0-9]/', $password)) {
        return ["valido" => false, "mensaje" => "Falta un carácter especial"];
    }

    return ["valido" => true, "mensaje" => "Usuario registrado"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (
        empty($_POST["nombre"]) ||
        empty($_POST["email"]) ||
        empty($_POST["password"]) ||
        empty($_POST["password2"])
        
    ) {
        $mensaje = "Falta rellenar algún campo";
        $error = true;
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $mensaje = "El email está mal";
        $error = true;
    } elseif ($_POST["password"] !== $_POST["password2"]) {
        $mensaje = "Las contraseñas no coinciden";
        $error = true;
    } else {
        $contraBien = validarPassword($_POST["password"]);
        if ($contraBien["valido"]===false) {
            $error = true;
            $mensaje = $contraBien["mensaje"];
        } else {
            $mensaje = $contraBien["mensaje"];
        }
        
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
</head>

<body>
    <?php if ($_SERVER["REQUEST_METHOD"] == "GET" || $error === true): ?>
        <h1>Registro de usuario</h1>



        <form action="registrar.php" method="post">
            Nombre:
            <input type="text" name="nombre">
            <br><br>

            Correo electrónico:
            <input type="email" name="email">
            <br><br>

            Contraseña:
            <input type="password" name="password">
            <br><br>

            Repetir contraseña:
            <input type="password" name="password2">
            <br><br>

            <input type="submit" value="Registrarse">
        </form>
    <?php else: ?>
       <?php echo "<p>".htmlspecialchars($mensaje)."</p>"; ?>
    <?php endif ?>

</body>

</html>