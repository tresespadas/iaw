<?php
session_start();
$_SESSION['nom-cliente']=$_POST['nom-cliente'];
$_SESSION['tamano']=$_POST['tamano'];
$_SESSION['num-compo']=$_POST['num-comp'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Selección de componentes</title>
</head>
<body>
	<?php
	#echo $_POST['nom-cliente'];
	#echo $_POST['tamano'];
	$numero_componentes=$_POST['num-comp'];
	echo "<h1>Selección de componentes para {$_POST['nom-cliente']}</h1>";	
	echo "<form action='resumen.php' method='post'>";
	for ($i=1; $i<=$numero_componentes; $i++)
	{
		echo "<br><label for='comp$i'>Componente $i: </label>";
		echo "<select name='comp$i'>";
		echo "<option value='Procesador'>Procesador</option>";
		echo "<option value='Tarjeta Gráfica'>Tarjeta Gráfica</option>";
		echo "<option value='Memoria RAM'>Memoria RAM</option>";
		echo "<option value='Disco SSD'>Disco SSD</option>";
		echo "<option value='Fuente'>Fuente</option>";
		echo "<option value='Placa base'>Placa base</option>";
		echo "<option value='Refrigeración'>Refrigeración</option>";
		echo "</select><br>";
	}
	echo "<br><label for='ciudad'>Ciudad de entrega: </label>";
	echo "<input type='text' name='ciudad' id='ciudad'>";

	echo "<br><input type='checkbox' name='acepto-cookie' id='acepto-cookie'>";
	echo "<label for='acepto-cookie'>Guardar mi nombre en una cookie</label><br>";
	
	echo "<br><input type='submit' value='Calcular precio'>";

	echo "</form>"
	?>
</body>
</html>

