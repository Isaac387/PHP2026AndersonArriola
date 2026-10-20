<?php

use BcMath\Number;
function usuarioOk($usuario, $contraseña) :bool {
   $contra = trim($contraseña);
   if (mb_strlen($contra, 'UTF-8')>=8 && $usuario === strrev($contra)) {
      # code...
      return true;
   }
   return false;
}

function totalPalabras($cadena): int{
   $cadenaSinEsapcios = trim($cadena);
 return str_word_count($cadenaSinEsapcios);
}

function masSeRepite($cadena): string{
   $cadenaSinEsapcios = trim($cadena);
   $masrepetida =0;
   $numrepe =0;
   $letra="";
   for ($i=0; $i < mb_strlen($cadenaSinEsapcios) ; $i++) { 
      $numrepe = substr_count($cadenaSinEsapcios, $cadenaSinEsapcios[$i]);
      if ($masrepetida < $numrepe) {
         $masrepetida = $numrepe;
         $letra = $cadenaSinEsapcios[$i];
      }
   }
   return $letra;
}

function palabraRepetida ($cadena) : string{
   $cadenaSeparada = explode(" ", $cadena);

   $masSeRepite = array_count_values($cadenaSeparada);
   arsort($masSeRepite);

   return array_key_first($masSeRepite);
}
