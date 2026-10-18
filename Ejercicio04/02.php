<?php
$faltaNums = '';
$resultado = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero1 = $_POST['num1'];
    $numero2 = $_POST['num2'];
    $operacionComprueba = $_POST['operacion'];
    // Aquí trabajarás con los datos recibidos
    if (!is_numeric($numero1) || !is_numeric($numero2)) {
        $faltaNums = 'Tienes que introducir los dos números';
    } else {
        switch ($operacionComprueba) {
            case 'sumar':
                $resultado = $numero1 + $numero2;
                break;
            case 'restar':
                $resultado = $numero1 - $numero2;
                break;
            case 'multiplicar':
                $resultado = $numero1 * $numero2;
                break;
            case 'dividir':
                if ($numero2 == 0) {
                    $faltaNums = 'No se puede dividir entre cero';
                } else {
                    $resultado = ceil($numero1 / $numero2);
                }
                break;
            default:
                $faltaNums = 'Operación no válida';
        }
    }
    if (isset($_POST['formato']) && $faltaNums == '') {
        $formato = $_POST['formato'];
        $resultado = intval($resultado); // Asegurarse de que el resultado sea un número entero
        switch ($formato) {
            case 'decimal':
                // No se necesita conversión, el resultado ya está en decimal
                break;
            case 'binario':
                $resultado = decbin($resultado);
                break;
            case 'hexadecimal':
                $resultado = dechex($resultado);
                break;
            default:
                $faltaNums = 'Formato no válido';
        }
    } 


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejer2</title>
</head>

<body>

    <div id="cuerpo">
    <form action="02.php" method="post">
        <header>
            <h1>Mini Calculadora</h1>
        </header>
        <label for="num1">Número 1:</label>
        <input type="number" name="num1" id="num1" ><br>
        <label for="num2">Número 2:</label>
        <input type="number" name="num2" id="num2" ><br>
        <div id="resultado">
            <button type="submit" name="operacion" value="sumar">+</button>
            <button type="submit" name="operacion" value="restar">-</button>
            <button type="submit" name="operacion" value="multiplicar">*</button>
            <button type="submit" name="operacion" value="dividir">/</button>
            <button type="reset" >borrar</button>
        </div>
        <div id="formato">
            <input type="radio" id="decimal" name="formato" value="decimal" checked>
            <label for="decimal">decimal</label>
            <input type="radio" id="binario" name="formato" value="binario">
            <label for="binario">binario</label>
            <input type="radio" id="hexadecimal" name="formato" value="hexadecimal">
            <label for="hexadecimal">hexadecimal</label><br>
        </div>
    </form>
    <?php
        echo ($faltaNums != '') ? '<p>' . $faltaNums . '</p>' : '<p>' . $resultado . '</p>';
    ?>
    </div>
</body>

</html>