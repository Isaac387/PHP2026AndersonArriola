<?php
$paises = array(
    'Francia' => array("Capital" => "París", "Poblacion" => "50000000"),
    'España' => array("Capital" => "Madrid", "Poblacion" => "42000000"),
    'Italia' => array("Capital" => "Roma", "Poblacion" => "46000000"),
    'Argentina' => array("Capital" => "Buenos Aires", "Poblacion" => "40000000"),
    'Colombia' => array("Capital" => "Bogotá", "Poblacion" => "36000000"),
    'Chile' => array("Capital" => "Santiago", "Poblacion" => "36000000"),
    'Suecia' => array("Capital" => "Estocolmo", "Poblacion" => "25000000"),
);
// Forma moderna, mas compacta
$ciudades = [
    'Francia' => ["París", "Burdeos", "Niza", "Lille", "Nantes"],
    'España' => ["Madrid", "Barcelona", "León", "Sevilla", "Valencia", "Málaga"],
    'Italia' => [
        "Roma",
        "Venecia",
        "Florencia",
        "Pisa",
        "Génova",
        "Milán",
        "Turín",
        "Nápoles"
    ],
    'Argentina' => ["Buenos Aires", "Córdoba", "Parana", "Rosario"],
    'Colombia' => ["Bogotá", "Medellín", "Cali", "Barranquilla", "Bucaramanga"],
    'Chile' => ["Santiago", "Arica", "Iquique", "Osorno", "Viña del Mar"],
    'Suecia' => ["Estocolmo", "Upsala", "Gotemburgo", "Lund"],
];

// Ejemplo de uso
    uasort($paises, function ($a, $b) {
        return $a["Poblacion"] <=> $b["Poblacion"];
    });
    //con arrray_key_last() cogemos la ultima clave de un array se puede usar en arrays normales y matrices
    $pais = array_key_last($paises);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejer06v2</title>
</head>
<body>
    <h1>Pais mas poblado ordenando el array <span><?=$pais?></span></h1>
    <?php
    //la funcion nl2br solo es para que los \n funcionen como br en cadena de texto en php
    //echo nl2br($pais_con_mas_poblacion). "<br>";
    
    echo "País: " . $pais. "<br>";
    echo "Capital: " . $paises[$pais]['Capital']. "<br>";
    echo "Población: " . $paises[$pais]['Poblacion']. "<br>";

    echo "ciudades: <br>";
    foreach ($ciudades[$pais] as $value) {
        echo $value . "<br>";
    }
    ?> 
</body>
</html>