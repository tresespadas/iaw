<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insertar vehículo - Tongazo Seguro</title>
  </head>
  <body>
  <?php
  require 'funciones.php';
  $pdo = conecta("localhost","tongazo","root");
  if ($pdo == NULL)
  {
    echo "Ha ocurrido un error con la conexión";
    exit;
  }
  ?>
  </body>
</html>
