<?php

class Pedido
{
    private int $num_ped;
    private int $cod_cliente;
    private string $producto;
    private int $precio;
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
