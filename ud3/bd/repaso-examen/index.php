<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require 'funciones.php';
$pdo = conecta("conexion.txt");
$contenido = $pdo->query("SELECT COUNT(*) FROM alumnos;");
$num_alumnos = $contenido->fetchColumn();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repaso de Examen PHP Crud</title>
</head>
<body> 
    <h2>Índice repaso de Examen PHP CRUD</h2>
    <a href="buscar.php">Buscar alumnos</a><br>
    <?php
    if (isset($_SESSION['autorizado']))
    {
        echo "<a href='borrar.php'>Borrar alumnos</a><br>";
        echo "<a href='pre-insertar.php'>Insertar alumnos</a><br>";
        echo "<a href='no-login.php'>Cerrar sesión</a><br>";
    }
    else
    {
        echo "<a href='login.php'>Inicia sesión</a><br>";
    }
    if ($num_alumnos == 0) // Significa que está vacía
    {
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' name='cargar' value='Cargar datos'>";
        echo "</form>";
    }
    if (isset($_POST['cargar']))
    {
        cargar("datos.txt");
        header ("Location: index.php");
    }
    if ($num_alumnos > 0) // Significa que hay datos
    {
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' name='guardar' value='Guardar datos'>";
        echo "</form>";
    }
    if (isset($_POST['guardar']))
    {
        guardar("backup.txt");
        header ("Location: index.php");
    }
    ?>
</body>
</html>