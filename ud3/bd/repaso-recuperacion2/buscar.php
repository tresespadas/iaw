<?php
session_start();
require 'funciones.php';
if (!isset($_SESSION['logged'])) // Evitando un path trasversal [?]
{
    echo "Se necesita una cuenta de usuario para esta función. Pincha <a href='index.php'>aquí</a> para volver al inicio.";
    die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix - Buscar película o serie de TV</title>
    <style>
        table, th, tr, td
        {
            border: 2px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <?php
        echo "<form action='buscar.php' method='post'>";
        echo "<fieldset>";
        echo "<legend>Busca una película o serie de TV</legend>";
        echo "<label for='nombre'>Nombre </label>";
        echo "<input type='text' name='nombre' id='nombre' required><br>";
        echo "<label for='tipo'>Tipo </label>";
        echo "<select name='tipo'>";
        $tipos = leer_tipos("lista_tipos.txt");
        for ($i=0; $i<count($tipos); ++$i)
        {
            echo "<option value='$tipos[$i]'>$tipos[$i]</option>";
        }
        echo "</select>";
        echo "<br>";
        echo "</fieldset>";
        echo "<input type='submit' name='buscar' id='buscar' value='Buscar'>";
        echo "</form>";

        if (isset($_POST['buscar']))
        {
            $nombre = $_POST['nombre'];
            $tipo = $_POST['tipo'];

            $pdo = conecta('netflix');

            if ($tipo == 'película')
            {
                $busqueda = $pdo->query("SELECT titulo, fecha_estreno, duracion FROM peliculas WHERE titulo LIKE '%$nombre%'");

                echo "<table>";
                echo "<tr>";
                echo "<th>Título</th>";
                echo "<th>Fecha de estreno</th>";
                echo "<th>Duración</th>";
                echo "</tr>";
                while ($fila = $busqueda->fetch())
                {
                    echo "<tr>";
                    echo "<td>$fila[titulo]</td>";
                    echo "<td>$fila[fecha_estreno]</td>";
                    echo "<td>$fila[duracion]</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else
            {
                $busqueda = $pdo->query("SELECT series.titulo, series.fecha_estreno, temporada FROM series LEFT JOIN temporadas ON series.id=temporadas.id_serie WHERE series.titulo LIKE '%$nombre%'");

                echo "<table>";
                echo "<tr>";
                echo "<th>Título</th>";
                echo "<th>Fecha de estreno</th>";
                echo "<th>Temporada</th>";
                echo "</tr>";
                while ($fila = $busqueda->fetch())
                {
                    echo "<tr>";
                    echo "<td>$fila[titulo]</td>";
                    echo "<td>$fila[fecha_estreno]</td>";
                    echo "<td>$fila[temporada]</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
    ?>
    <a href="index.php">Volver al inicio</a>
    
</body>
</html>