<?php

function total(array $pedido):int{
    $suma =0;
    foreach ($pedido as  $value) {
        $suma += $value->precio;
    }
return $suma;
}