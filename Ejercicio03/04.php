<?php
$deportes = [
    "futbol" => "deportesIMG/futbol.jpeg",
    "baloncesto " => "deportesIMG/baloncesto.png",
    "karate" => "deportesIMG/karate.png",
    "tenis" => "deportesIMG/tenis.jpeg",
    "pingpong" => "deportesIMG/pingpon.jpeg"
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejer4</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>Deporte</th>
            <th>Logo</th>
        </tr>
        <?php
        foreach ($deportes as $key => $value) {
            echo "<tr>";
            echo "<td>$key</td>";
            echo "<td><img src='$value' alt='$key'></td>"; // Corregido: comillas en el src y eliminado el punto suelto
            echo "</tr>";
        }
        ?>
    </table>
</body> 

</html>