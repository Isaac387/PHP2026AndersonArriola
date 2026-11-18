<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="4;url=acceso.html">
    <title>Sin resultados - RentaCar</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            width: 90%;
            max-width: 500px;
            text-align: center;
        }

        .icon-no-results {
            font-size: 50px;
            margin-bottom: 20px;
        }

        h1 {
            color: #1a3c5e;
            font-size: 1.4rem;
            margin-bottom: 15px;
        }

        p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        .btn-primary {
            background-color: #1a3c5e;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2c527a;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="icon-no-results">&#9888;</div>

        <h1>Búsqueda sin resultados</h1>

        <p><b> <?= htmlspecialchars($msg_error) ?> </b></p>
        <div class="button-group">
            <a href="acceso.html" class="btn btn-primary">Volverás al formulario en 4 segundos...</a>
        </div>
    </div>

</body>

</html>