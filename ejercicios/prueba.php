<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>primero</title>
</head>
<body>
   <? 
    $HOLA = "Hola mundo";
    for ($i=0; $i < 10; $i++) { 
        if ($i % 2 == 0) {
          echo "<h1>$HOLA</h1>";
        }
        
    }
    $i = 0;
    do {
        echo "<h1>$HOLA</h1>";
    } while ($i < 10);
   
   
   
   ?>
</body>
</html>