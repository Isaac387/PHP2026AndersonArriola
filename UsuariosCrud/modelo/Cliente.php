<?php

class Cliente
{
    private int $cod_cliente;
    private string $nombre;
    private string $clave;
    private int $veces;
    function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    function __set($name, $value)
    {
        if (property_exists($this,$name)) {
            $this->$name = $value;
        }
    }
}
