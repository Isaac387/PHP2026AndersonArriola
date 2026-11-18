<?php 
session_start();

require_once 'modelo/Cliente.php';
require_once 'modelo/AccesoDatos.php';
require_once 'modelo/Pedido.php';
require_once 'tools.php';

$nvisitas = 0;
// Si existe el cookie lo muestro
if (isset($_COOKIE["visitas"])){
    $nvisitas = $_COOKIE["visitas"];
}
$nvisitas++;
// Vuelvo a fijar el valor de cookie válido por un mes
setcookie("visitas", $nvisitas, time() + 30*24*3600, "/");

$nombre = $_GET['nombre'];
$clave = $_GET['clave'];
$msg_error = "";

$ac = AccesoDatos::initModelo();
$clientePedidos = $ac->getCliente($nombre,$clave);
$pedidosCompletos = [];
if (!$clientePedidos) {
    $msg_error = "el usuario: ".$nombre." o la clave: ".$clave." son incorrectas";
    include "vistas/vistaerror.php";
    exit();
} else {
    $ac->sumarVez($clientePedidos->cod_cliente);
    $nvisitas = $clientePedidos->veces + 1;
    setcookie("visitas", $nvisitas, time() + 30 * 24 * 3600, "/");
    $_COOKIE["visitas"] = $nvisitas;

    $pedidosCompletos = $ac->getsPedido($clientePedidos->cod_cliente);
    include 'vistas/vistapedidos.php';
    }

