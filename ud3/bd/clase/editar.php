<?php

include "funciones.php";
session_start();

$conexion = conecta("localhost","clase","root");
$mi_id = $_POST['editar'];
$_SESSION['edita']=$mi_id;
//var_dump($_SESSION);
$consulta = $conexion->query("SELECT * FROM alumnos WHERE ID='$mi_id'");
//Mostrado sencillo

while ($fila = $consulta->fetch()){  /*Este paso es obligatorio para convertir a array, porque sino es un objeto */
	$nombre = $fila['nombre']; 	
}

//$nombre ="hola";
?>
<form action="editar2.php" method="post">
	<label for="nombre">Nombre: </label>
	<input type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>"><br>
	<!--input type="hidden" name="id" id="id" value="<?php echo $mi_id;?>"><br-->
	<input type="submit" value="Editar" name="boton">
</form>

