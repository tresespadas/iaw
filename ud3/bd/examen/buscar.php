<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
require 'funciones.php';
$pdo = conecta("examen");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserción de tareas</title>
</head>
<body>
    <form action="buscar.php" method="post">
    <?php
    echo "Nombre: "."<input type='text' name='nombre' id='nombre'>";
    echo "Tipo: "."<input type='text' name='nombre' id='nombre'>";
    echo "<input type='submit' value='Buscar' name='boton'>";
    ?>
    </form>
    <?php
    if (isset($_POST['boton']))
    {
        echo "<table>";
        echo "<td><th>Nombre</th><th>Tipo</th><th>Duracion</th></td>";
        #if ($_POST['nombre'] && $_POST['tipo'])
        #{


        #}
        #else
        #{
            $mostrar = $pdo->query("SELECT * FROM tareas");
            $mostrado = $mostrar->fetchAll(PDO::FETCH_ASSOC);
            #var_dump($mostrado);
            
            foreach($mostrado as $fila)
            {
                echo "<td>";
                echo "<tr>".$fila['nombre']."</tr>"; // Algo está fallando en la tabla... 
                echo "<tr>".$fila['tipo']."</tr>";
                echo "<tr>".$fila['duracion']."</tr>";
            }
        #}
        echo "</td>";
        echo "</table>";
    }
    ?>
</body>
</html>