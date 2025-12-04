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
    <title>Buscar alumnos</title>
    <style>
        table, tr, th, td
        {
            border: 2px, black, solid
        }
    </style>
</head>
<body>
    <form action="buscar.php" method="post">
    <fieldset>
    <legend>Busca alumnos por parámetros</legend>
        Nota <input type="radio" name="opt" id="nota" value="nota">
        <select name="operador">
            <option value="<"><</option>
            <option value=">">></option>
            <option value="=">=</option>
        </select>
        <input type="number" name="numero" min=0 max=10>
        <br>Nombre <input type="radio" name="opt" id="nombre" value="nombre">
        <input type="text" name="texto" id="texto">
    </fieldset> 
    <input type="submit" value="Buscar" name="boton">
    <br><a href="index.php">Volver al menú</a>
    </form>

    <?php
    if (isset($_POST['boton']))
    {
        $campo = $_POST['opt'];
        
        if ($campo == 'nota')
        {
            $operador = $_POST['operador'];
            $numero = $_POST['numero'];

            $mostrar = $pdo->query("SELECT * FROM alumnos WHERE $campo $operador $numero;");

            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Nota</th>";
            while ($fila = $mostrar->fetch())
            {
                echo "<tr>";
                echo "<td>".$fila['id']."</td>";
                echo "<td>".$fila['nombre']."</td>";
                echo "<td>".$fila['apellido']."</td>";
                echo "<td>".$fila['nota']."</td>";
            }
            echo "</tr>";
            echo "</table>";
        }
        else
        {
            $texto = $_POST['texto'];

            $mostrar = $pdo->query("SELECT * FROM alumnos WHERE $campo = '$texto';");
            
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Nota</th>";
            while ($fila = $mostrar->fetch())
            {
                echo "<tr>";
                echo "<td>".$fila['id']."</td>";
                echo "<td>".$fila['nombre']."</td>";
                echo "<td>".$fila['apellido']."</td>";
                echo "<td>".$fila['nota']."</td>";
            }
            echo "</tr>";
            echo "</table>";
            
        }
    }
    ?>

</body>
</html>