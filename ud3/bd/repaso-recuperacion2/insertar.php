<?php
session_start();
if (!isset($_SESSION['logged']))
{
    echo "Se necesitan permisos administrativos para esta función. Pincha <a href='index.php'>aquí</a> para volver al inicio.";
    die();
}
require 'funciones.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix - Insertar una película o serie de TV</title>
</head>
<body>
    <?php
        echo "<form action='insertar.php' method='post'>";
        echo "<fieldset>";
        echo "<legend>Introduce una película o serie de TV</legend>";
        echo "<label for='nombre'>Nombre </label>";
        echo "<input type='text' name='nombre' id='nombre' required><br>";
        echo "<label for='fecha_estreno'>Fecha de estreno </label>";
        echo "<input type='date' name='fecha_estreno' id='fecha_estreno' required><br>";
        echo "<label for='duracion'>Duración </label>";
        echo "<input type='number' name='duracion' id='duracion'><br>";
        echo "<label for='tipo'>Tipo </label>";
        echo "<select name='tipo'>";
        $tipos = leer_tipos("lista_tipos.txt");
        foreach ($tipos as $tipo)
        {
            echo "<option value='$tipo'>$tipo</option>";
        }
        echo "<select>";
        echo "</fieldset>";
        echo "<input type='submit' name='insertar' id='insertar' value='Insertar'>";
        echo "</form>";
        echo "<footer>";
        echo "<a href='index.php'>Volver al inicio</a>";
        echo "</footer>";

        if (isset($_POST['insertar']))
        {
            $nombre = $_POST['nombre'];
            $tipo = $_POST['tipo'];
            $fecha = $_POST['fecha_estreno'];
            $duracion = $_POST['duracion'];
            $pdo = conecta("netflix");

            if ($tipo == 'película')
            {
                #$insertar = $pdo->query("INSERT INTO peliculas (titulo,fecha_estreno,duracion) VALUES ('$nombre','$fecha','$duracion')");
                $insertar = $pdo->prepare("INSERT INTO peliculas (titulo,fecha_estreno,duracion) VALUES (?,?,?)");
                $insertar->bindParam(1,$nombre);
                $insertar->bindParam(2,$fecha);
                $insertar->bindParam(3,$duracion);
                $insertar->execute();

                $resultado = $insertar->rowCount();

                echo "Se ha insertado la película {$nombre}";
            }
            else
            {
                $insertar = $pdo->query("INSERT INTO series (titulo,fecha_estreno) VALUES ('$nombre','$fecha')");
                $resultado = $insertar->rowCount();

                echo "Se ha insertado la serie {$nombre}";

            }
        }
    ?>
    
</body>
</html>