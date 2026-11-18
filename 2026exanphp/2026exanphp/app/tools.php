<?php 
/**
 *  Genera una cadena un texto de la clase -> 1: Turista, 2: Business, 3: First Class
 * @param int $num
 * @return string - Texto asociado al valor del número
 */
function verClase( int $num):string {
    $clase = "";
        switch ($num) {
            case 1:
                $clase = "Turista";
                break;
            case 2:
                $clase = "Business";
                break;
            case 3:
                $clase = "First Class";
                break;
        }
    return $clase;
    };

/**
 *  Muestra un mensaje según el valor de plazas, si es menor de 10  devuelve 
 *  la cadena 'Ultimas plazas' y es caso contrario 'Disponibles'
 * @param int $plazas
 * @return string
 */
function verEstado ( int $plazas):string {
    if ($plazas >=10) {
        return "Plazas Disponibles";
    } else {
        return "Ultimas Plazas";
    }
    
}
