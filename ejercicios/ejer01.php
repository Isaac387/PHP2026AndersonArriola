<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejer01</title>
</head>
<body>
    <?php
    $num1 = Random_int(1, 10);

    $num2 = Random_int(1, 10);
    echo "suma: " . ($num1 + $num2)."<br>";
    echo "resta: " . ($num1 - $num2)."<br>";
    echo "multiplicación: " . ($num1 * $num2)."<br>";
    echo "división: " . ($num1 / $num2)."<br>";
    echo "potencia: " . ($num1 ** $num2)."<br>";
    echo "módulo: " . ($num1 % $num2)."<br>";
    ?>
</body>
</html>