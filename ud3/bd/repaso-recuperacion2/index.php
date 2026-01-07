<?php
session_start();
require 'funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix</title>
</head>
<body>
    <h2>Netflix</h2>
    <?php
    if (isset($_SESSION['logged'])) // Si el inicio de sesión es exitoso
    {
        echo "<a href='buscar.php'>Buscar película o serie de TV</a><br>";
        if (isset($_SESSION['root']))
        {
            echo "<a href='borrar.php'>Borrar una película o serie de TV</a><br>";
            echo "<a href='insertar.php'>Introduce una película o serie de TV</a><br>";
        }
        echo "<a href='no-login.php'>Cerrar sesión</a><br>";
    }
    elseif (isset($_POST['iniciar'])) // Comprobando credenciales
    {
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
                $_SESSION['logged'] = true;
                header('Location: index.php');
            }
            else
            {
                $_SESSION['usuario'] = true;
                $_SESSION['logged'] = true;
                header('Location: index.php');
            }
            #echo "Inicio de sesión exitoso como {$usuario}";
            #echo "<br>";
        }
        else
        {
            echo "Error en las credenciales<br>";
            echo "Pulsa <a href='index.php'>aquí</a> para volver a intentarlo.";
        }
    }
    else // Página principal (login)
    {
        echo "<form action='index.php' method='post'>";
        echo "<fieldset>";
        echo "<legend>Inicia sesión</legend>";
        echo "<label for='usuario'>Nombre</label>";
        echo "<input type='text' name='usuario' id='usuario'>";
        echo "<br>";
        echo "<label for='pass'>Contraseña</label>";
        echo "<input type='password' name='pass' id='pass'>";
        echo "</fieldset>";
        echo "<input type='submit' name='iniciar' id='iniciar' value='Inicia sesión'>";
        echo "</form>";
    }
    ?>

</body>
</html>