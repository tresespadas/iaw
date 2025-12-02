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
  <h2>Pre insertar</h2>
  <form action="insertar.php" method="post">
    <label for="num-coches">Números de coches a insertar: </label>
    <input type="number" id="num-coches" name="num-coches" min=1>
    <input type="submit" value="Insertar">
  </form>
  <a href="index.php">Volver al menú</a>
  </body>
</html>
