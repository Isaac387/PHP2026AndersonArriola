<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD DE USUARIOS</title>
    <link href="web/default.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div id="container">
        <div id="header">
            <h1>GESTIÓN DE USUARIOS versión 1.1 + BD (PDO)</h1>
        </div>

        <div id="content">
            <form method="POST">
                <table>
                    <tr>
                    <tr>
                        <td><label for="codigo">codigo</label></td>
                        <td>
                            <input type="number" id="codigo" name="codigo"
                                value="<?= $produ->codigo ?>"
                                <?= ($orden == "Detalles" || $orden == "Modificar") ? "readonly" : "" ?>>
                        </td>
                    </tr>
                    <td><label for="nombre">Nombre</label></td>
                    <td>
                        <input type="text" id="nombre" name="nombre"
                            value="<?= $produ->nombre ?>"
                            <?= ($orden == "Detalles") ? "readonly" : "" ?>
                            autofocus>
                    </td>
                    </tr>
                    </tr>
                    <td><label for="stock">stock</label></td>
                    <td>
                        <input type="text" id="stock" name="stock"
                            value="<?= $produ->stock ?>"
                            <?= ($orden == "Detalles") ? "readonly" : "" ?>
                            autofocus>
                    </td>
                    </tr>
                    <tr>
                        <td><label for="stock_min">stock_min</label></td>
                        <td>
                            <input type="text" id="stock_min" name="stock_min"
                                value="<?= $produ->stock_min ?>"
                                <?= ($orden == "Detalles") ? "readonly" : "" ?>>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="precio">precio</label></td>
                        <td>
                            <input type="number" id="precio" name="precio"
                                value="<?= $produ->precio ?>"
                                <?= ($orden == "Detalles") ? "readonly" : "" ?>>
                        </td>
                    </tr>
                </table>

                <div style="margin-top: 20px;">
                    <input type="submit" name="orden" value="<?= $orden ?>">
                    <input type="submit" name="orden" value="Volver">
                </div>
            </form>
        </div>
    </div>

</body>

</html>
<?php exit(); ?>