<?php
session_start();
require 'funciones.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar tareas</title>
</head>
<body>
    <form action="buscar.php" method="post">
        <fieldset>
            <legend>Buscador de tareas</legend>
            Nombre: <input type="text" name="nombre" id="nombre">
            Tipo: <input type="text" name="tipo" id="tipo">
            <input type="hidden" name="busqueda" value=1>
            <input type="submit" value="Buscar">
        </fieldset>
    </form>
    <?php
    if (isset($_POST['busqueda']))
    {
        $pdo = conecta("recuperacion");
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        if (($nombre == "") && ($tipo == ""))
        {
            $busqueda = $pdo->query("SELECT * FROM tareas");

            while ($fila = $busqueda->fetch())
            {
            echo $fila['id']." ".$fila['nombre']." ".$fila['tipo']." ".$fila['duracion'];
            echo "<br>";
            }
        }
    }
    ?>
</body>
</html>