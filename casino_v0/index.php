<?php
session_start();

// Cambiar  visitar --> VALOR DE COOKIE
// Cambiar disponible --> VALOR DE SESSION

$msg = "";

// Entra en el casino --------------------------------
if (!isset($_SESSION['disponible'])) {
  // Actualizo el contador de visitas
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cantidadini'])) {
    $_SESSION['disponible'] = $_POST['cantidadini'];
    $disponible = intval($_SESSION['disponible']);

  } else {
  $nvisitas = 0;
    if (isset($_COOKIE["visitas"])) {
    $nvisitas = $_COOKIE["visitas"];
  }

  $nvisitas++;

  // Cookie válida durante un mes
  setcookie("visitas", $nvisitas, time() + 30 * 24 * 3600);
    include_once('form_bienvenida.php');
    exit();
  }

} else {
  $disponible = intval($_SESSION['disponible']);
}



// Si realiza una apuesta ----------------------------------
// llama a procesar apuesta 
if (isset($_POST["apostar"])) {
  if ($_POST["cantidad"] > $disponible) {
    $msg = "es mas dinero del que tienes disponible";
  } else if ($_POST["cantidad"] <= 0) {
    $msg = "No se puede apostar nada de dinero";
  } else {
    $msg = procesarApuesta($_POST["cantidad"], $disponible, $_POST['apuesta']);
    $_SESSION['disponible'] = $disponible;
  }
}

// Si abandona o ya no le queda dinero -------------------------
if (isset($_POST["dejar"]) || ($_SESSION["disponible"] == 0)) {
  session_destroy();
  include_once('despedida.php');
  exit();
} else {
  require_once "form_apuesta.php";
}
// Muestro el formulario si puede seguir apostando

?>


<?php

/**
 *  FUNCIONES AUXILIARES
 */

function procesarApuesta(int $valorapuesta, int &$saldodisponible, string $apuesta): string
{
  $num_aleatorio = random_int(1, 10);
  $msgresultado = "";
  if (($num_aleatorio % 2 == 0 && $apuesta == "PAR") || ($num_aleatorio % 2 != 0 && $apuesta == "IMPAR")) {
    $msgresultado = "RESULTADO DE LA APUESTA: " . $apuesta . " GANASTE." . " El numero era: " . $num_aleatorio;
    $saldodisponible += $valorapuesta;
  } else {
    $msgresultado = "RESULTADO DE LA APUESTA: " . $apuesta . " PERDISTE" . " El numero era: " . $num_aleatorio;
    $saldodisponible -= $valorapuesta;
  }

  return $msgresultado;
}

