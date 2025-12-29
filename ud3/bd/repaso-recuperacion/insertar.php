<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION["autorizado"]))
{
    echo "<a href='index.php'>Volver al inicio</a><br>";
    die("Debes autenticarte antes.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insertar2.php" method="post">
    <fieldset>
        <legend>Número de tareas</legend>
        ¿Cuántas tareas quieres insertar?: <input type="number" name="num_tareas" id="num_tareas" min="1" required>  
    </fieldset>
    <input type="submit" value="Insertar">
    </form>
    <a href="index.php">Volver al inicio</a>
    <?php
    if (isset($_POST["num_tareas"]))
    {
        $num_tareas = $_POST["num_tareas"];
        echo "<h2>Inserción de tareas</h2>";

        for ($i=1; $i<=$num_tareas; ++$i)
        {
            echo "<h3>Datos de la tarea $i</h3>";
        }
    }
    ?>
</body>
</html>