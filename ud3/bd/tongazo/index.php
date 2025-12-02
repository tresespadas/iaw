<?php
session_start();
require 'funciones.php';
$pdo = conecta("conexion.txt");
$contenido = $pdo->query("SELECT COUNT(*) FROM vehiculos"); // Comprobación si la bbdd está vacía
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
    if ($contenido->fetchColumn() == 0)
    {
      echo "<form action='index.php' method='post'>";
      echo "<input type='submit' value='Cargar datos a la bd' name='boton'>";
      echo "</form>";
    }
    if (isset($_POST['boton']))
    {
      $archivo = fopen("datos.txt","r");

      $cabecera = fgets($archivo);

      while($matricula = trim(fgets($archivo)) !== false);
      {
        $marca = trim(fgets($archivo));
        $modelo = trim(fgets($archivo));
        $kms = trim(fgets($archivo));
        $precio = trim(fgets($archivo));
        $separador = trim(fgets($archivo));

        $insert = $pdo->prepare("INSERT INTO vehiculos (matricula, marca, modelo, kms, precio) VALUES (?,?,?,?,?);");
        $insert->execute([$matricula,$marca,$modelo,$kms,$precio]);
      }

      fclose($archivo);
    }
  ?>
  </body>
</html>
