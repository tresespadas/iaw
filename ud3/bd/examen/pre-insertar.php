<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserción de tareas</title>
</head>
<body>
    <?php
    if (!isset($_SESSION['autorizado']))
    {
        echo "Debes estar autenticado para poder insertar datos.";
        echo "<br><a href='index.php'>Volver al menú</a>";
        die();
    }
    ?>
    <h2>Insercción de tareas</h2>
    <form action="insertar.php" method="post">
        ¿Cuántas tareas quieres insertar? <input type="number" name="num_tareas" id="num_tareas">
        <br><input type="submit" value="Insertar">
    </form>
</body>
</html>