<?php
session_start();
// Si se envía por POST un nombre
if (isset($_POST['nombre']))
{
  // Si es el primer nombre o se cambia el nombre
  if (!isset($_SESSION['nombre']) || $_POST['nombre'] != $_SESSION['nombre'])
  {
    $_SESSION['num_visitas']=0;
  }
  $_SESSION['nombre']=$_POST['nombre'];

  // Con esto le quitas la pregunta del Confirm Form Resubmision:
  // header("Location: ej1-iniciar-sesion.php")
}

//Si ya hay una sesion con nombre
if (isset($_SESSION['nombre']))
{
  $_SESSION['num_visitas']++;
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
    <form action="ej1-iniciar-sesion.php" method="post">
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
      echo "<br>Has visitado la página {$_SESSION['num_visitas']} veces";
      echo "<br><a href='ej1-cerrar-sesion.php'>Pulsa aquí para cerrar sesión</a>";
    } else {
      echo "<br>La sesión aún no se ha cargado. Escribe tu nombre y dale a Enviar";
    }
    ?>
  </body>
</html>
