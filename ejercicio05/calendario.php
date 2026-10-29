<?php
$meses = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
];
$anio_actual = date("Y");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mes = $_POST['mes'];
    $año = $_POST['año'];
    

    $dias = cal_days_in_month(CAL_GREGORIAN, $mes, $año);
    //saco la fecha en segundos para poder sacar el dia con el que empieza el mes del 1 al 7
    $fecha = mktime(0, 0, 0, $mes, 1, $año);
    //sacamos el dia de la semana con el que empieza la semana devuelve un numero del 1 al 7
    $dia = date("N", $fecha);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calendario</title>
</head>

<body>
    <center>
        <?php if ($_SERVER["REQUEST_METHOD"] == "GET"): ?>
            <h1>Bienvenido al generador de calendarios</h1><br><br>
            <form action="calendario.php" method="post">
                mes:
                <select name="mes" id="mes">
                    <?php foreach ($meses as $key => $nombreMes): ?>
                        <option value="<?= $key + 1 ?>"><?= $nombreMes ?></option>
                    <?php endforeach ?>
                </select><br><br>
                año:
                <select name="año" id="año">
                    <?php for ($i = 1980; $i <= $anio_actual; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor ?>
                </select><br><br>
                <input type="submit" value="enviar">
            </form>
        <?php else: ?>
            <table border="1">
                <tr>
                    <td>Mes: <?= $mes ?></td>
                    <td>Año: <?= $año ?></td>
                </tr>
                <tr>
                    <td>L</td>
                    <td>M</td>
                    <td>X</td>
                    <td>J</td>
                    <td>V</td>
                    <td>S</td>
                    <td>D</td>
                </tr>
                <?php
                $columna = 0;
                ?>

                <tr>
                    <?php for ($i = 1; $i < $dia; $i++): ?>
                        <td></td>
                        <?php $columna++; ?>
                    <?php endfor ?>

                    <?php for ($i = 1; $i <= $dias; $i++): ?>
                        <td><?= $i ?></td>
                        <?php $columna++; ?>

                        <?php if ($columna == 7 && $i < $dias): ?>
                        </tr>
                        <tr>
                            <?php $columna = 0; ?>
                        <?php endif ?>
                    <?php endfor ?>

                    <?php while ($columna < 7): ?>
                        <td></td>
                        <?php $columna++; ?>
                    <?php endwhile ?>
                </tr>
            </table>
        <?php endif ?>
    </center>
</body>

</html>