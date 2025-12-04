<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'funciones.php';
$pdo = conecta("conexion.txt");

if (isset($_POST['num_alumnos']))
{
  $num_alumnos = $_POST['num_alumnos'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar alumno</title>
</head>
<body>
  <form action="insertar.php" method="post">
  <?php
    for ($i=1; $i<=$num_alumnos; $i++)
    {
        echo "<h2>Vehículo $i</h2>";
        echo "Nombre: <input type='text' name='nombre$i' id='nombre$i'><br>";
        echo "Apellido: <input type='text' name='apellido$i' id='apellido$i'><br>";
        echo "Nota: <input type='number' name='nota$i' id='nota$i'><br>";
    }
    echo "<input type='hidden' name='num_alumnos' value='$num_alumnos'>";
    echo "<br><input type='submit' value='Insertar' name='boton'>";
  ?>
  </form>
  <a href="index.php">Volver al menú</a>
  <?php
  if (isset($_POST['boton']))
  {
    for ($i=1; $i<=$num_alumnos; $i++)
    {
      $nombre = $_POST["nombre$i"];
      $apellido = $_POST["apellido$i"];
      $nota = $_POST["nota$i"];
      #echo $nombre."".$apellido."".$nota;

      $intro = $pdo->prepare("INSERT INTO alumnos (nombre,apellido,nota) VALUES (?,?,?)");
      $intro->execute([$nombre,$apellido,$nota]);
      
      if ($intro->rowCount() > 0)
      {
        echo "<br>Datos insertados correctamente";
        header ("Location: index.php");
      }
      else
      {
        echo "<br>Error al insertar los datos";
      }
    }
  }
  ?>
</body>
</html>