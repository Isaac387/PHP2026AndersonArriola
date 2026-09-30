<?php
    $medios = [ "El Pais" => "https://www.elpais.com", "El Mundo" => "https://www.elmundo.es",
    "El Abc"=> "https://www.abc.es"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejer2</title>
    <style>
        ul.lista-cuadrada{
            list-style-type: square ;
        }

    </style>
</head>
<body>
    <h1>Lista con los periodicos</h1>
    <ul class="lista-cuadrada">
       <?php
        foreach ($medios as $key => $value) {
            echo "<li><a href=$value>$key</a></li>";
        }
       ?>
    </ul>

    
</body>
</html>