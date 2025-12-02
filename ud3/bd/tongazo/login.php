<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicia sesión en Tongazo Seguro</title>
  </head>
  <body>
  <?php
  require 'funciones.php';
  $pdo = conecta("conexion.txt");
  if ($pdo == NULL)
  {
    echo "Ha ocurrido un error en la conexión";
    exit;
  }
  ?>
  <h2>Inicia sesión</h2>
  <form action="login.php" method="post">
    <label for="password">Contraseña</label>
    <input type="text" id="password" name="password">
    <input type="submit" value="Inicia sessión">
  </form>
  <a href="index.php">Volver al menú</a>
  <?php
  if (($_POST['password']) == '555')
  {
    try
    {
      $_SESSION['autorizado']="on";
      #echo "Sesión iniciada";
      echo "<script> alert('Sesión iniciada') </script>";
    }
    catch (PDOException $e)
    {
      echo "La conexión ha fallado por ".$e->getMessage();
    }
  }
  ?>
  </body>
</html>
