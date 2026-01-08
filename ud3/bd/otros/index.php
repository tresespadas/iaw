<?php
require 'funciones.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
    <?php
    $arr = leer("archivo.txt");
    var_dump($arr);

    echo $arr["edad"];
    ?>
</body>
</html>