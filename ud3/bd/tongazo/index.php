<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menú principal - Tongazo Seguro</title>
  </head>
  <body>
  <h2>Tongazo Seguro</h2>
  <a href="prev-insertar.php">Insertar vehículo</a><br>
  <a href="buscar.php">Buscar vehículo</a><br>
  <?php
    if (isset($_SESSION['autorizado']))
    {
      echo "<a href='borrar.php'>Borrar vehículo</a><br>";
      echo "<a href='no-login.php'>Cierra sesión</a>";
    }
    else
    {
      echo "<a href='login.php'>Inicia sesión</a>";
    }
  ?>
  </body>
</html>
