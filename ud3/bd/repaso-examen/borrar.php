<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'funciones.php';
$pdo = conecta("conexion.txt");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar alumnos</title>
</head>
<body>
    <form action="borrar.php" method="post">
    <fieldset>
        <legend>Indica el alumno que quieres borrar</legend>
        Nombre <input type="text" name="nombre" id="nombre"><br>
        Apellido <input type="text" name="apellido" id="apellido"><br>
    </fieldset>
    <input type="submit" value="Borrar" name='borrar'>
    </form>  
    <a href="index.php">Volver al menú</a>

    <?php
    if (isset($_POST['borrar']))
    {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    $borrado = $pdo->prepare("DELETE FROM alumnos WHERE nombre = ? AND apellido = ?;");
    $borrado->execute([$nombre,$apellido]);

    if ($borrado->rowCount() > 0)
    {
        echo "<br>Alumno borrado correctamente";
    }
    else
    {
        echo "<br>No existe ningún alumno llamado {$nombre} {$apellido}";
    }
    }
    ?>
</body>
</html>