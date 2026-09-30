<?php
    $bono_loto = [];
    $contador = 0;
    while (count($bono_loto) <= 5) {
        $numero = Random_int(1, 49);
        if (!in_array($numero, $bono_loto)) {
            $bono_loto[$contador] = $numero;
            $contador++;
        }
    }
    
    $complementario = array_pop($bono_loto);
    sort($bono_loto);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejer5</title>
</head>
<body>
    <h1>jugando a la bonoloto</h1>
    
    <table border="1">
        <tr>
            <?php 
            foreach ($bono_loto as $value) {
                echo "<td>$value</td>";
            }
            echo "<td> complementario....". $complementario . "</td>";
            ?>
        </tr>


    </table>
</body>
</html>