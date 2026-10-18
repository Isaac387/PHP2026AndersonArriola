<?php
$usuario_clave = ["pedro" => "1234", "maria" => "5678", "juan" => "abcd"];

if (!isset($_POST["usuario"]) || !isset($_POST["clave"])) {
    echo "Tienes que introducir algo mi rey!!!";
}elseif (array_key_exists($_POST["usuario"], $usuario_clave) && $usuario_clave[$_POST["usuario"]] == $_POST["clave"]) {
    echo "Bienvenido " . $_POST["usuario"];
}  else {
    echo "el usuario: ". $_POST["usuario"]. " no existe";
}
?>