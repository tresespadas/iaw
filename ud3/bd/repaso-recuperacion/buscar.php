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
    <style>
        table, tr, th, td
        {
            border-collapse: collapse;
            border: 2px solid black;
        }
    </style>
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
        if (($nombre == "") && ($tipo == "")) // No relleno ninguno
        {
            $busqueda = $pdo->query("SELECT * FROM tareas");

            echo "<table>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Nombre</th>";
                    echo "<th>Tipo</th>";
                    echo "<th>Duración</th>";
                echo "</tr>";
            while ($fila = $busqueda->fetch())
            {
                echo "<tr>";
                    echo "<td>$fila[id]</td>";
                    echo "<td>$fila[nombre]</td>";
                    echo "<td>$fila[tipo]</td>";
                    echo "<td>$fila[duracion]</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        if (($nombre != "") && ($tipo == "")) // Sólo relleno nombre
        {
            $busqueda = $pdo->query("SELECT nombre FROM tareas WHERE nombre LIKE '%$nombre%'");
            echo "<table>";
                echo "<tr>";
                    echo "<th>Nombre</th>";
                echo "</tr>";
            while ($fila = $busqueda->fetch())
            {
                echo "<tr>";
                    echo "<td>$fila[nombre]</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        if (($nombre != "") && ($tipo != "")) // Rellenando ambos
        {
            $busqueda = $pdo->query("SELECT nombre,tipo FROM tareas WHERE nombre LIKE '%$nombre%' AND tipo LIKE '%$tipo%'");
            echo "<table>";
                echo "<tr>";
                    echo "<th>Nombre</th>";
                    echo "<th>Tipo</th>";
                echo "</tr>";
            while ($fila = $busqueda->fetch())
            {
                echo "<tr>";
                    echo "<td>$fila[nombre]</td>";
                    echo "<td>$fila[tipo]</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>
    <br>
    <a href="index.php">Volver al inicio</a>
</body>
</html>