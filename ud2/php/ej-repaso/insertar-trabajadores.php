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
    <h1>Información sobre trabajadores</h1>
    <form action="insertar-trabajadores2.php" method="post">
      <label for="num-trab">Número de trabajadores a insertar:</label>
      <input type="number" id="num-trab" name="num-trab" min=1 required>
      <br><input type="submit" value="Enviar">
    </form>
  </body>
</html>
