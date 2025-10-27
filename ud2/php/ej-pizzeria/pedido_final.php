<?php
if ($_POST['cookie']=="on")
{
  setcookie('nombre_usuario', $_POST['nombre']);
}
#if isset($_POST['cookie'])
#{
#  setcookie('nombre_usuario', $_POST['nombre'], time() + 3600);
#}
#var_dump($_POST['cookie']);
#echo isset($_POST['cookie']);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php
    if (isset($_COOKIE['nombre_usuario']))
    {
    echo "<p>Cookie existente: " .($_COOKIE['nombre_usuario']). "</p>";
    }
    ?>
  </body>
</html>
