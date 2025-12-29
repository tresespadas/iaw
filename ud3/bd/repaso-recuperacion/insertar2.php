<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'funciones.php';
if (!isset($_SESSION["autorizado"]))
{
    echo "<a href='index.php'>Volver al inicio</a><br>";
    die("Debes autenticarte antes.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insertar2.php" method="post">
        <?php
        if (isset($_POST["num_tareas"]))
        {
            $_SESSION["num_tareas"] = $_POST["num_tareas"];
            $num_tareas = $_POST["num_tareas"];

            $modulos = leer_modulos("mismodulos.txt");
            //var_dump($modulos);

            echo "<h2>Inserción de tareas</h2>";

            for ($i=1; $i<=$num_tareas; ++$i)
            {
                echo "<h3>Datos de la tarea $i</h3>";
                echo "Nombre:<input type='text' name='nom$i' id='nom$i'><br>";
                echo "Tipo:<select name='tareas$i'>";
                for ($j=0; $j<count($modulos); ++$j)
                {
                    echo "<option value='$modulos[$j]'>$modulos[$j]</option>";
                }
                echo "</select>";
                echo "<br>";
                echo "Duración en minutos:<input type='number' name='duracion$i' id='duracion$i'>";
                echo "<hr>";
            }
            echo "<input type='hidden' name='insertado' value='1'>";
            echo "<input type='submit' value='Insertar'>";
        }
        ?>
    </form>

    <?php
        if (isset($_POST['insertado']))
        {
            $num_tareas = $_SESSION["num_tareas"];
            $pdo = conecta("recuperacion");

            for ($i=1; $i<=$num_tareas; ++$i)
            {
                $insercion = "INSERT INTO tareas (nombre, tipo, duracion) VALUES (?,?,?);";
                $consulta = $pdo->prepare($insercion);
                //echo $_POST["nom$i"];
                $consulta->bindParam(1,$_POST["nom$i"]);
                //echo $_POST["tareas$i"];
                $consulta->bindParam(2,$_POST["tareas$i"]);
                //echo $_POST["duracion$i"];
                $consulta->bindParam(3,$_POST["duracion$i"]);
                $consulta->execute();
            }
            echo "Datos insertados correctamente";
            echo "<a href='index.php'>Volver al inicio</a>";
        }
    ?>

</body>
</html>