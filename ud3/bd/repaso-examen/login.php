<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión</title>
</head>
<body>
   <form action="login.php" method="post">
        <fieldset>
            <legend>Inicia sesión con tus credenciales</legend>
            Contraseña <input type="text" name="pass" id="pass"><br>
        </fieldset>
        <input type="submit" value="Iniciar" name='iniciar'>
   </form> 
   <?php
   if (isset($_POST['iniciar']))
   {
    if ($_POST['pass'] == '555') 
    {
        $_SESSION['autorizado'] = true;
        echo "<script>
            alert('Inicio de sesión correcto');
            window.location.href = 'index.php';
        </script>";
    }
    else
    {
        echo "<script>alert('Inicio de sesión incorrecto')</script>";
    }
   }
   ?>
</body>
</html>