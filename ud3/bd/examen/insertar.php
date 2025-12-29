<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();

require 'funciones.php';
$pdo = conecta("examen");

if (isset($_POST['num_tareas']))
{
    $num_tareas = $_POST['num_tareas'];
    $_SESSION['num_tareas'] = $num_tareas;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserción de tareas</title>
</head>
<body>
    <?php
    if (!isset($_SESSION['autorizado']))
    {
        echo "Debes estar autenticado para poder insertar datos.";
        echo "<br><a href='index.php'>Volver al menú</a>";
        die();
    }
    ?>
    <h2>Insercción de tareas</h2>
    <form action="insertar.php" method="post">
    <?php
        $archivo = fopen("mismodulos.txt","r");

        #$arr = []; -- No soy capaz de meterlo en un array (?)
        while (!feof($archivo))
        {
            $tarea1 = trim(fgets($archivo));
            $tarea2 = trim(fgets($archivo));
            $tarea3 = trim(fgets($archivo));
            $tarea4 = trim(fgets($archivo));
            $tarea5 = trim(fgets($archivo));
            $tarea6 = trim(fgets($archivo));
            $tarea7 = trim(fgets($archivo));
            $tarea8 = trim(fgets($archivo));
        }
        fclose($archivo);
        for ($i=1; $i<=$num_tareas; $i++)
        {
            echo "<h3>Datos de la tarea $i</h3>";
            echo "Nombre: "."<input type='text' name='nombre$i' id='nombre$i'><br>";
            echo "Tipo: "."<select>.
                <option value='$tarea1$i'>$tarea1</option>.
                <option value='$tarea2$i'>$tarea2</option>.
                <option value='$tarea3$i'>$tarea3</option>.
                <option value='$tarea4$i'>$tarea4</option>.
                <option value='$tarea5$i'>$tarea5</option>.
                <option value='$tarea6$i'>$tarea6</option>.
                <option value='$tarea7$i'>$tarea7</option>.
                <option value='$tarea8$i'>$tarea8</option>.
                </select>";
            echo "<br>Duración en minutos: "."<input type='number' name='minutos$i' id='minutos$i'><br>";
        }
        echo "<input type='hidden' value='$num_tareas' name='num_tareas'>";
        echo "<input type='submit' value='Insertar' name='boton'>";
    ?>
    </form>
    <?php
    if (isset($_POST['boton']))
    {
        $insertado = $pdo->prepare("INSERT INTO tareas (nombre,tipo,duracion) VALUES (?,?,?)");
        $num_tareas = $_POST['num_tareas'];

        for ($i=1; $i<=$num_tareas; $i++)
        {
            $nombre = $_POST["nombre$i"];
            $duracion = $_POST["minutos$i"];
            echo $nombre;
            echo $duracion;
            #echo "INSERT INTO tareas (nombre,tipo,duracion) VALUES ($nombre,0,$duracion)";
            $insertado->execute([$nombre,0,$duracion]); // No soy capaz de hacer lo del tipo por el chorizo que he usado para el select/option
        }
        if ($insertado->rowCount() > 0)
        {
            echo "Datos insertados correctamente";
        }
        else
        {
            echo "Hubo un error a la hora de insertar los datos";
        }
    }
    ?>
</body>
</html>