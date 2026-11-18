<?php
session_start();

require_once 'modelo/Vuelo.php';
require_once 'modelo/AccesoDatos.php';
require_once 'tools.php';

$nvisitas = 0;
// Si existe el cookie lo muestro
if (isset($_COOKIE["visitas"])){
    $nvisitas = $_COOKIE["visitas"];
}
$nvisitas++;
// Vuelvo a fijar el valor de cookie válido por un mes
setcookie("visitas", $nvisitas, time() + 30*24*3600, "/");

echo "visitas".$nvisitas;
$ciudad = $_GET['destino'];
$plazas = (int)$_GET['plazas'];
$msg_error = "";

if ($plazas < 1 || $plazas > 5) {
    $msg_error = "ERROR: El N.º de plazas no es correcto debe ser entre 1 y  5";
    include 'vistas/error.php';
    exit();
}
$ac = AccesoDatos::initModelo();

$vuelos = $ac->getsVuelos($ciudad, $plazas);
$clase = "";
if (empty($vuelos)) {
    if (!$ac->existeDestino($ciudad)) {
        $msg_error = "ERROR: No hay vuelos con destino a " . $ciudad . ".";
    } else {
        $msg_error = "ERROR: No hay vuelos con plazas disponibles con destino " . $ciudad . ".";
    }
    include 'vistas/error.php';
    exit();
} else {
    
    include 'vistas/listado.php';
}
