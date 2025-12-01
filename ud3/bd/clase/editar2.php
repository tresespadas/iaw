<?php

include "funciones.php";
session_start();

$conexion = conecta("localhost","clase","root");
if ($_POST['boton']!=""){
$nuevoNombre = $_POST['nombre'];
/*$id = $_POST['id'];*/
$id = $_SESSION['edita'];
echo "La sesion es: ".$_SESSION['edita'];
$consulta = $conexion->query("UPDATE alumnos SET nombre='$nuevoNombre' WHERE ID='$id'");
header("Location:conexion.php");

}

?>
