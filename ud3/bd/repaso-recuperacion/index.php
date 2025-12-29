<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h2>Gestor de tareas personal</h2>
    <a href="insertar.php">Inserción de tareas</a><br>
    <a href="buscar.php">Búsqueda de tareas</a><br>

    <?php
    if (isset($_SESSION["autorizado"]))
    {
        echo "<a href='no-acceder.php'>Cerrar sesión</a>";
    }
    else
    {
        echo "<a href='acceder.php'>Acceso privado</a>";
    }
    ?>
</body>
</html>