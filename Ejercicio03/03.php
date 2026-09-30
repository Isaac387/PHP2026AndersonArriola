<?php
    $medios = [ "El Pais" => "https://www.elpais.com", "El Mundo" => "https://www.elmundo.es",
    "El Abc"=> "https://www.abc.es", "La vanguardia" => "https://www.lavanguardia.com", "El Mundo Today" => "https://www.elmundotoday.com"];

    $medioAlAzar = array_rand($medios);
    $medioElegido = $medios[$medioAlAzar];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejer3</title>
</head>
<body>
    <!-- el metodo array_search es la manera mas corta de saber la clave de un valor si ya sabemos el valor -->
    <h1>el medio recomendado es : <a href="<?= $medioElegido?>"><?= array_search( $medioElegido , $medios)?></a></h1>    
</body>
</html>