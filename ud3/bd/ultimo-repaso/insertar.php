<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (!$_POST['insertar']) // Si no se ha insertado nada
        {
            echo "<form action='insertar.php' method='post'>";
            echo "<fieldset>";
            echo "<legend>Insercción de vehículos</legend>";
            echo "<label for='num_vehiculos'>¿Cuántos vehículos vas a insertar? </label>";
            echo "<input type='number' name='num_vehiculos' id='num_vehiculos' required>";
            echo "</fieldset>";
            echo "<input type='submit' name='insertar' value='Insertar'>";
            echo "</form>";
        }
        else
        {
            $num_vehiculos = $_POST['num_vehiculos'];
            echo $num_vehiculos;
        }
    ?>
</body>
</html>