<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de usuario</title>
</head>
<body>
    <form action="login.php" method="post">
    <fieldset>
    <legend>Inicia sesión</legend>
        Contraseña: <input type="text" name="pass" id="pass">
    </fieldset>
    <input type="submit" value="Iniciar" name="boton">
    <br><a href="index.php">Volver al menú</a>
    </form>
    <?php
    if (isset($_POST['boton']))
    {
        $pass = $_POST['pass'];
        
        if ($pass == '1234')
        {
            echo "<script>alert('Inicio de sesión correcto')</script>";
            $_SESSION['autorizado'] = true;
        }
        else
        {
            echo "Contraseña incorrecta";
        }
    }
    ?>
</body>
</html>