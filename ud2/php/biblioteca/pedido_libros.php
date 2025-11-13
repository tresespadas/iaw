<?php
session_start();
require 'funciones.php';
if (isset($_POST['cookie']))
{
    setcookie('nombre_cliente',$_POST['nombre_cliente'],time() + 3600, "/");
}

if (isset($_POST['nombre_cliente']))
{
    $_SESSION['nombre_cliente']=$_POST['nombre_cliente'];
}

if (isset($_POST['numero_libros']))
{
    $_SESSION['numero_libros']=$_POST['numero_libros'];
}

if (isset($_POST['email']))
{
    $_SESSION['email']=$_POST['email'];
}

if (isset($_POST['ciudad'])) {
    $_SESSION['ciudad']=$_POST['ciudad'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido de libros - BookPlanet</title>
</head>
<body>
    <form action="resumen.php" method="post">
    <?php
    echo "<h2>Sección de libros para {$_POST['nombre_cliente']}</h2>";
    $num_libros=$_POST['numero_libros'];
    for ($i=1; $i<= $num_libros; $i++)
    {
        echo "<label for='lib$i'>Libro $i: </label>";
        echo "<select name='lib$i'>";
        echo escribir_select("libros.txt");
        echo "</select><br>";
    }
    ?>
    <br>
    <p>Método de envío:
        <input type="radio" name="envio" id="envio" value="Estándar">Estándar (sin recargo)
        <input type="radio" name="envio" id="envio" value="Urgente">Urgente (+10%)
        <input type="radio" name="envio" id="envio" value="Internacional">Internacional (+25%)
    </p>

    <input type="submit" value="Calcular precio y registrar pedido">
    </form>

</body>
</html>