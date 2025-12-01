<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar vehículo</title>
    <style>
      table, tr, th, td
      {
        border: 1px solid black;
      }
    </style>
  </head>
  <body>
  <?php
  require 'funciones.php';
  $pdo = conecta("localhost","tongazo","root");
  if ($pdo == NULL)
  {
    echo "Ha ocurrido un error en la conexión";
    exit;
  }
  ?>
  <h2>Buscar vehículo</h2>
  <p>Selecciona los criterios para la búsqueda
  <form action="buscar.php" method="post">
    <fieldset>
      <legend>Campos para la búsqueda</legend>
      <label for="precio">Precio</label>
      <input type="radio" name="seleccion" id="precio" value="precio">
      <label for="kms">Kilómetros</label>
      <input type="radio" name="seleccion" id="kms" value="kms">
      <select name="opt" id="opt">
        <option value=">">></option>
        <option value="<"><</option>
        <option value="=">=</option>
      </select>
      <input type="text" id="valor" name="valor" required placeholder="Valor para la búsqueda"><br>
    </fieldset>
    <input type="submit" value="Buscar vehículo">
  </form>
  <a href="index.php">Volver al menú</a>
  </p>
  <?php
  if (isset($_POST['valor']))
  {
    // Recogida de datos del form
    $valor = $_POST['valor'];
    $opt = $_POST['opt'];
    $seleccion = $_POST['seleccion'];

    try
    {
     if ($seleccion === "kms")
     {
        #echo "SELECT * FROM vehiculos WHERE kms $opt $valor";
        $select = $pdo->query("SELECT * FROM vehiculos WHERE kms $opt $valor");
     }
     if ($seleccion === "precio")
     {
        #echo "SELECT * FROM vehiculos WHERE kms $opt $valor";
        $select = $pdo->query("SELECT * FROM vehiculos WHERE precio $opt $valor");
     }
    }
    catch (PDOException $e)
    {
      echo "La conexión ha fallado por ".$e->getMessage();
    }

    echo "<table>";
    echo "<tr><th>Matricula</th><th>Marca</th><th>Modelo</th><th>Kilómetros</th><th>Precio</th>";
    while ($fila = $select->fetch())
    {
      echo "<tr>";
      echo "<td>".$fila['matricula']."</td>";
      echo "<td>".$fila['marca']."</td>";
      echo "<td>".$fila['modelo']."</td>";
      echo "<td>".$fila['kms']."</td>";
      echo "<td>".$fila['precio']."</td>";
    }
    echo "</tr>";
    echo "</table>";
  }
  ?>
  </body>
</html>
