<html>
<head>
	<style>
	table, tr, th, td {
		border: 1px solid grey;
		border-collapse: collapse;
	}
	td, th {padding: 10px 20px;}
	th { background-color: lightgrey;}
	</style>
</head>
<body>
<form action="conexion.php" method="post">
	<label for="nombre">Nombre a buscar: </label>
	<input type="text" name="filtro" id="nombre"><br>
	<input type="submit" value="Buscar">
</form>
<?php
require "funciones.php";
$pdo = conecta("localhost","clase","root");
if ($pdo == null){
	echo "Ha ocurrido un error al conectar";
	exit;
}
if ($_POST['filtro']!=""){
	$nombre = $_POST['filtro'];
	//echo "SELECT * FROM alumnos WHERE nombre LIKE '%$nombre%'";
	$resultado = $pdo->query("SELECT * FROM alumnos WHERE nombre LIKE '%$nombre%'");
}
else{
	// Select
	$resultado = $pdo->query("SELECT * FROM alumnos");
}
//var_dump($resultado);
echo "<hr>";
//Mostrado sencillo
echo "<table>";
echo "<tr><th>Nombre</th><th>Primer apellido</th><th>Edad</th><th>Borrar</th></tr>";
while ($fila = $resultado->fetch()){ 
	echo "<tr>";
	echo "<td>".$fila['nombre']."</td>"; 
	echo "<td>".$fila['apellido1']."</td>";
	echo "<td>".$fila['edad']."</td>";?>
	<td>
	<form action="borrar.php" method="post">
	<input type="hidden" name="borrar" value='<?php echo $fila['ID']; ?>'>
	<input type="submit" value="Borrar">
	</form>
	</td>
<?php
	echo "</tr>";
}
echo "</table>";
echo "<hr>";
echo "Hay ".$resultado->rowCount()." usuarios en el sistema<br>"; 

?>
</body>
</html>
