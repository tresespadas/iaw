<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen de PHP CRUD - Alvaro</title>
</head>
<body>
   <h2>Gestor de tareas personal</h2> 
   <a href="pre-insertar.php">Inserción de tareas</a><br>
   <a href="buscar.php">Búsqueda de tareas</a><br>
   <?php
   if (isset($_SESSION['autorizado']))
   {
    echo "<a href='no-login.php'>Desconectar</a><br>";
   }
   else
   {
    echo "<a href='login.php'>Acceso privado</a><br>";
   }
   ?>
</body>
</html>