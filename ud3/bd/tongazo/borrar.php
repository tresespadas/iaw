<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar vehículo</title>
  </head>
  <body>
  <h2>Buscar vehículo</h2>
  <?php
  require 'funciones.php';
  $pdo = conecta("localhost","tongazo","root");
  if ($pdo == NULL)
  {
    echo "Ha ocurrido un error en la conexión";
    exit;
  }
  ?>
  <form action="borrar.php" method="post">
    <label for="matricula">Matrícula: </label>
    <input type="text" id="matricula" name="matricula" required pattern="[0-9]{4}[A-Z]{3}"><br>
    <input type="submit" value="Borrar vehículo">
  </form>
  <?php
  if (isset($_POST['matricula']))
  {
    // Recogida de datos del form
    $matricula = $_POST['matricula'];

    try
    {
      #echo "DELETE FROM vehiculos WHERE matricula = '$matricula'";
      $pdo->query("DELETE FROM vehiculos WHERE matricula = '$matricula'");
    }
    catch (PDOException $e)
    {
      echo "La conexión ha fallado por ".$e->getMessage();
    }
  }
  ?>
  </body>
</html>
