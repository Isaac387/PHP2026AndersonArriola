<?php

class Vuelo
{
    private string $cod_vuelo;
    private string $destino;
    private string $aerolinea;
    private int $clase;
    private float $precio_billete;
    private int $asientos_libres;

    public function __get($name)
    {
        if(property_exists($this,$name)){
            return $this->$name;
        } else {
            return "el atributo no existe";
        }
    }

    public function __set($name, $value)
    {
        if (property_exists($this,$name)) {
            $this->$name = $value;
        }
    }
}
