<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda - Coches Disponibles</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            width: 90%;
            max-width: 900px;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
        }

        h1 {
            color: #1a3c5e;
            font-size: 1.5rem;
            margin: 10px 0;
        }

        .city-badge {
            background-color: #e2e8f0;
            color: #1a3c5e;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #1a3c5e;
            color: white;
            text-align: left;
            padding: 15px;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            color: #444;
        }

        tr:hover {
            background-color: #f8faff;
        }

        .price {
            font-weight: bold;
            color: #27ae60;
        }

        .ultimas {
            color: red;
            font-weight: bold;
        }

        .btn-book {
            background-color: #1a3c5e;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.8rem;
            transition: 0.3s;
        }

        .btn-book:hover {
            background-color: #2c527a;
        }

        .back-link {
            display: block;
            margin-top: 25px;
            text-align: center;
            color: #666;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <header>
            <h1>Bienvenido Usuario: <span class="city-badge"><?= $nombre ?></span>Has entrado<span class="city-badge"><?= $_COOKIE['visitas']; ?></span>veces en nuestra web</h1>
        </header>
        <h1>Esta es su lista de pedidos del cliente con código:<span class="city-badge"><?= $clientePedidos->cod_cliente ?></span></h1>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <!-- Tabla a generar en PHP -->
                <?php if (empty($pedidosCompletos)): ?>
                    <tr>
                        <td colspan="2">No existen pedidos para este cliente.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($pedidosCompletos as $pedido): ?>
                        <tr>
                            <td><?= $pedido->producto ?></td>
                            <td><?= $pedido->precio ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td><strong>TOTAL PEDIDOS</strong></td>
                        <td><?= total($pedidosCompletos); ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <a href="acceso.html" class="back-link">← Volver al buscador</a>
    </div>
</body>

</html>