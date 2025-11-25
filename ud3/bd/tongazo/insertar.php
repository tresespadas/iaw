<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insertar vehículo - Tongazo Seguro</title>
  </head>
  <body>
  <h2>Insertar vehículo</h2>
  <?php
  require 'funciones.php';
  $pdo = conecta("localhost","tongazo","root");
  if ($pdo == NULL)
  {
    echo "Ha ocurrido un error con la conexión";
    exit;
  }
  ?>
  <form action="insertar.php" method="post">
    <label for="matricula">Matrícula</label>
    <input type="text" id="matricula" name="matricula" required pattern="[0-9]{4}[A-Z]{3}"><br>
    <label for="marca">Marca</label>
    <input type="text" id="marca" name="marca" required><br>
    <label for="modelo">Modelo</label>
    <input type="text" id="modelo" name="modelo" required><br>
    <label for="kms">Kms</label>
    <input type="number" id="kms" name="kms" required step="0.1" min="0"><br>
    <label for="precio">Precio</label>
    <input type="number" id="precio" name="precio" required step="0.01" min="0"><br>
    <input type="submit" value="Guardar en la BD">
  </form>
  <?php
  // Debo hacer un if que controle que se insertan datos (con 1 campo basta)
  try
  {
    $pdo->query("INSERT INTO vehiculos (matricula,marca,modelo,kms,precio) VALUES ('$matricula','$marca','$modelo','$kms','$precio')");
  }
  catch (PDOException $e)
  {
    echo "La conexión ha fallado por ".$e->getMessage();
  }
  ?>
  </body>
</html>
