<?php
$letras = [
    'T',
    'R',
    'W',
    'A',
    'G',
    'M',
    'Y',
    'F',
    'P',
    'D',
    'X',
    'B',
    'N',
    'J',
    'Z',
    'S',
    'Q',
    'V',
    'H',
    'L',
    'C',
    'K',
    'E'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["dni"]) || !ctype_digit($_POST["dni"])) {
        $resultado = "tienes que rellenar el campo con los numeros de tu dni mi rey!!!!";
    } else {
        $resultado = "<h1>La letra de tu DNI es: " . muestraLetraNIF($_POST["dni"], $letras)."</h1>";
    }
}
function muestraLetraNIF($numDNI, $letras2): string
{
    $indice = $numDNI % 23;
    return $letras2[$indice];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIF</title>
</head>

<body>
    <?php if ($_SERVER["REQUEST_METHOD"] == "GET"):?>
    <h1>Te voy a mostra tu letra NIF</h1>
    <form action="nif.php" method="post">
        DNI: <input type="number" name="dni">
        <input type="submit" name="enviar">
    </form>
    <?php else: ?>
        <?php echo $resultado; ?>
    <?php endif?>
</body>

</html>