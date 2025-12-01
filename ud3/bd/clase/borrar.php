<?php

	include "funciones.php";
	$pdo = conecta("localhost","clase","root");
	$borrar= $_POST['borrar'];
	$pdo->query("DELETE FROM alumnos WHERE ID='$borrar'");
	echo "Registro borrado";


?>
<br>
<a href="conexion.php">Volver al listado</a>

