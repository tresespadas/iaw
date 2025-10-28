<?php
session_start();
if (isset($_POST['nombre']))
{
  $_SESSION['nombre']=$_POST['nombre'];
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejercicio 1 - Sesiones</title>
  </head>
  <body>
    <form action="ej1.php" method="post">
    <fieldset>
      <legend>Datos</legend>
      <label for="nombre">Nombre: </label>
      <input type="text" id="nombre" name="nombre" required>
    </fieldset>
    <input type="submit" value="Enviar">
    </form>

    <?php
    if (isset($_SESSION['nombre']))
    {
      echo "<br>La sesion se ha cargado correctamente. Tu nombre es: {$_SESSION['nombre']}";
    } else {
      echo "<br>La sesión aún no se ha cargado. Escribe tu nombre y dale a Enviar";
    }
    ?>
  </body>
</html>
