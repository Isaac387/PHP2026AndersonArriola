<?php
require_once(__DIR__ . "/../clases/BiciElectrica.php");

// Leer el fichero csv y devuelve una tabla de bicicletas
function cargarbicis(): array
{
    $fich = @fopen(__DIR__ . "/../../datos/Bicis.csv", "r");
    if ($fich == false) {
        die("Error al abrir el fichero");
    }
    $tabla = [];

    while ($valor = fgetcsv($fich)) {
        list($id, $cx, $cy, $bat, $op) = $valor;
        $bici = new BiciElectrica($id, $cx, $cy, $bat, $op);
        $tabla[] = $bici;
    }

    return $tabla;
}
// Devuelve una cadena con la tabla html de bicis operativas
function mostrartablabicis($tabla): string
{
    $cadena = "<table>
    <tr>
    <th>Id</th><th>Coord X</th><th>Cood Y</th><th>Bateria</th>
    </tr>";
    foreach ($tabla as $miBici) {
        if ($miBici->operativa) {
            $cadena .= "<tr>";
            $cadena .= "<td>" . $miBici->id . "</td>";
            $cadena .= "<td>" . $miBici->coordx . "</td>";
            $cadena .= "<td>" . $miBici->coordy . "</td>";
            $cadena .= "<td>" . $miBici->bateria . "%</td>";
            $cadena .= "</tr>";
        }
    }

    $cadena .= "</table>";

    return $cadena;
}


/**
 * Devuelve la bici con menor distancia a las coordenadas de usuario. 
 * @param $tabla - tabla de bicicletas
 * @param $x - Coordenada x de usuario
 * @param $y - Coordenada x de usuario
 * @return // bicicleta más cercana o null
 */
function bicimascercana($tabla, $x, $y)
{
    $bicicerca = null;
    $distanciaMin =PHP_INT_MAX;
    foreach ($tabla as $miBici) {
        if ($miBici->operativa) {
            if ($miBici->distancia($x, $y) < $distanciaMin) {
                $bicicerca = $miBici;
                $distanciaMin = $miBici->distancia($x, $y);
            }
        }
    }
    return $bicicerca;
    //$bicicerca;
}
