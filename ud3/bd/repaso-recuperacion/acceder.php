<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        p
        {
            color:red;
        }
    </style>
    <title>Acceso privado - Login</title>
</head>
<body>
    <form action="acceder.php" method="post">
    <fieldset>
        <legend>Inicia sessión</legend>
        Contraseña: <input type="text" name="pass" id="pass">  
    </fieldset>
    <input type="submit" value="Iniciar sesión">
    </form>
    <?php
    if (isset($_POST["pass"]))
    {
        if ($_POST["pass"] == '1234')
        {
            $_SESSION["autorizado"] = true;
            header('Location: index.php');
        }
        else
        {
            echo "<p>Contraseña inválida. Vuelve a intentarlo.</p>";
        }
    }
    ?>
    <a href="index.php">Volver al inicio</a>
</body>
</html>