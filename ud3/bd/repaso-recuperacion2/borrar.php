<?php
session_start();
if (!isset($_SESSION['root'])) // Evitando un path trasversal [?]
{
    echo "Se necesitan privilegios administrativos para esta función. Pincha <a href='index.php'>aquí</a> para volver al inicio.";
    die();
}
require 'funciones.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix - Borra una película o serie de TV</title>
</head>
<body>
    <?php
        echo "<form action='borrar.php' method='post'>";
        echo "<fieldset>";
        echo "<legend>Borra una película o serie de TV</legend>";
        echo "<label for='nombre'>Nombre </label>";
        echo "<input type='text' name='nombre' id='nombre' required><br>";
        echo "<label for='tipo'>Tipo </label>";
        echo "<select name='tipo'>";
        $tipos = leer_tipos("lista_tipos.txt");
        foreach ($tipos as $tipo)
        {
            echo "<option value='$tipo'>$tipo</option>";
        }
        echo "</select>";
        echo "</fieldset>";
        echo "<input type='submit' name='borrar' value='Borrar'>";
        echo "</form>";
        echo "<footer>";
        echo "<a href='index.php'>Volver al inicio</a>";
        echo "</footer>";

        if (isset($_POST['borrar']))
        {
            $nombre = $_POST['nombre'];
            $tipo = $_POST['tipo'];

            $pdo = conecta("netflix");

            if ($tipo == 'película')
            {
                $borrado = $pdo->query("DELETE FROM peliculas WHERE titulo = '$nombre'");
                $resultado = $borrado->rowCount();
                
                echo "Se han borrado {$resultado} películas con el nombre '$nombre'";
            }
            else
            {
                $borrado = $pdo->query("DELETE FROM series WHERE titulo = '$nombre'");
                $resultado = $borrado->rowCount();

                echo "Se han borrado {$resultado} serie con el nombre '$nombre'";
            }
        }
    ?>

</body>
</html>