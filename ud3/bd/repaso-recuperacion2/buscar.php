<?php
session_start();
require 'funciones.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix - Buscar película o serie de TV</title>
</head>
<body>
    <?php
        echo "<form action='buscar.php' method='post'>";
        echo "<fieldset>";
        echo "<legend>Busca una película o serie de TV</legend>";
        echo "<label for='nombre'>Nombre </label>";
        echo "<input type='text' name='nombre' id='nombre'><br>";
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
    ?>
    
</body>
</html>