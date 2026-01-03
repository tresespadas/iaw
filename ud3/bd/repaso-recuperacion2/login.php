<?php
session_start();
require 'funciones.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión en Netflix</title>
</head>
<body>
    <form action="login.php" method="post">
        <fieldset>
            <legend>Introduce tus credenciales</legend>
            Nombre: <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu nombre de usuario" required>
            Contraseña: <input type="password" name="pass" id="pass">
        </fieldset>
        <input type="submit" value="Iniciar" name="inicio">
    </form>

    <?php
    if (isset($_POST['inicio']))
    {
        #echo "Se ha intentado iniciar sesión";
        $usuario = $_POST['usuario'];
        $password = $_POST['pass'];
        $pdo = conecta("netflix");

        $consulta = $pdo->query("SELECT COUNT(*) FROM users WHERE usuario = '$usuario' AND password = '$password'");

        $resultado = $consulta->fetchColumn();

        if ($resultado == 1)
        {
            if ($usuario == 'root')
            {
                $_SESSION['root'] = true;
            }
            else
            {
                $_SESSION['usuario'] = true;
            }
            echo "Inicio de sesión exitoso como {$usuario}";
            echo "<br>";
            echo "Pulsa <a href='index.html'>aquí</a> para volver a a la página principal...";
        }
        else
        {
            echo "Error en las credenciales";
        }
    }
    ?>
    
</body>
</html>