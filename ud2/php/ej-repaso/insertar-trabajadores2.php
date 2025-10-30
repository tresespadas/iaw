<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Información sobre trabajadores</title>
  </head>
  <body>
  <?php
  $_SESSION['s-num_trab']=$_POST['num-trab'];
  $num_trab=$_SESSION['s-num_trab'];
  echo "<h1>Información sobre trabajadores</h1>";
  echo "<form action='listado-trabajadores.php' method='post'>";
  for ($i=1; $i<=$num_trab; $i++)
  {
    echo "<h2>Trabajador {$i}</h2>";
    echo "<label for='nom-trab$i'>Nombre: </label>";
    echo "<input type='text' id='nom-trab$i' name='nom-trab$i' required>";
    echo "<br><label for='nat$i'>Nacionalidad: </label>";
    echo "<select id= 'nat$i' name='nat$i'>";
    echo "<option value='espanola'>Española</option>";
    echo "<option value='otros'>Otros</option>";
    echo "</select>";
    echo "<br><label for='sueldo$i'>Sueldo Base:</label>";
    echo "<input type='number' id='sueldo$i' name='sueldo$i'>";
  }
  echo "<br><br><input type='submit' value='Enviar'>";
  echo "</form>";
  ?>
  </body>
</html>
