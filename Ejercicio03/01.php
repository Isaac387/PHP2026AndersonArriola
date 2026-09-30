<?php
function rellenaArray()
{
    $miArray = [];
    for ($i = 0; $i < 20; $i++) {
        $miArray[$i] = rand(1, 10);
    }
    return $miArray;
}

function mayorNum(array $array)
{
    return max($array);
}
function menorNum(array $array)
{
    return min($array);
}
function masVecesRepetido(array $array)
{
    //esta seria la mera larga de hacerlo
    // $conteo = [];
    // // el metodo isset devuelve un valor logico si ese valor ya existe en ese array
    // // y en este caso pasamos el valor a que sea clave y si lo encuentra por primera vez lo suma a uno 1
    // // y cuando ya esta en el array solo se suma el valor pero la clave no cambia algo como esto [1=>3]
    // foreach ($array as $valor) {
    //     if (!isset($conteo[$valor])) {
    //         $conteo[$valor] = 1; 
    //     } else {
    //         $conteo[$valor]++;
    //     }
    // }
          
    // $numeroMasFrecuente = null;
    // $maxFrecuencia = 0;

    // foreach ($conteo as $numero => $repeticiones) {
        
    //     if ($repeticiones > $maxFrecuencia) {
    //         $maxFrecuencia = $repeticiones;
    //         $numeroMasFrecuente = $numero;
    //     }
    // }

    // return $numeroMasFrecuente;

    // estos metodos los encontre en internet el primer metodo array_count_values($array) primero
    // cuenta cuantas veces se repite cada numero y ese numero de veces lo asocia al numero repetido
    // o sea seria algo asi como $Array = [5 => 3]; esto diria que el 5 se repite tres veces
    // con el otro metodo simplemente cojemos la primera clave del array que seria el numero mas repetido
    return array_key_first(array_count_values($array));
}
$obtenerArray = rellenaArray();
$mayorNumero = mayorNum($obtenerArray);
$menorNumero = menorNum($obtenerArray);
$masSeRepite = masVecesRepetido($obtenerArray);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio1</title>
</head>

<body>
    <table border="1" style="width: 80%;">
        <tr>
            <?php
            foreach ($obtenerArray as $va) {
                echo "<td> $va </td> ";
            }

            ?>
        </tr>

    </table>
    <?php
    echo "<br>";
    echo "numero mayor: ". $mayorNumero . "<br>";
    echo "numero menor: ". $menorNumero . "<br>";
    echo "numero que mas se repite: ". $masSeRepite . "<br>";
    ?>
</body>

</html>