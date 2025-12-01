<?php
session_start();
$num_coches = $_POST['num-coches'];
?>
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
  <?php
  for ($i=1; $i<=$num_coches; $i++)
  {
    echo "<h3>Vehículo $i</h3>";
    echo "<label>Matrícula</label>";
    echo "<input type='text' name='matricula[]' required pattern='[0-9]{4}[A-Z]{3}'><br>";
    echo "<label>Marca</label>";
    echo "<input type='text' name='marca[]' required><br>";
    echo "<label>Modelo</label>";
    echo "<input type='text' name='modelo[]' required><br>";
    echo "<label>Kms</label>";
    echo "<input type='number' name='kms[]' required step='0.1' min='0'><br>";
    echo "<label>Precio</label>";
    echo "<input type='number' name='precio[]' required step='0.01' min='0'><br>";
    echo "<br>";
  }
    echo "<input type='submit' value='Guardar en la BD'>";
  ?>
  </form>
  <a href="index.php">Volver al menú</a>
  <?php
  // Debo hacer un if que controle que se insertan datos (con 1 campo basta)
  if (isset($_POST['matricula']))
  {
    // Recogida de datos del formulario
    $matriculas = $_POST['matricula'];
    $marcas = $_POST['marca'];
    $modelos = $_POST['modelo'];
    $kms = $_POST['kms'];
    $precios = $_POST['precio'];

    try
    {
      for ($i=0; $i < count($matriculas); $i++)
      {
      #echo "INSERT INTO vehiculos (matricula,marca,modelo,kms,precio) VALUES ('$matricula','$marca','$modelo','$kms','$precio')";
      $pdo->query("INSERT INTO vehiculos (matricula,marca,modelo,kms,precio) VALUES ('{$matriculas[$i]}','{$marcas[$i]}','{$modelos[$i]}','{$kms[$i]}','{$precios[$i]}')");
      }
    }
    catch (PDOException $e)
    {
      echo "La conexión ha fallado por ".$e->getMessage();
    }
  }
  ?>
  </body>
</html>
