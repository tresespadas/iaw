<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pedido de ordenador</title>
</head>
<body>
	<h1>Pedido de ordenador a medida - TecnoByte</h1>
	<form action=componentes.php method="post">
	<label for="nom-cliente">Nombre del cliente: </label>
	<input type="text" name="nom-cliente" id="nom-cliente" required><br>

	<label for="num-comp">Número de componentes a personalizar (1 a 6): </label>
	<input type="number" name="num-comp" id="num-comp" min=1 max=6 required><br>

	<p>Tamaño del equipo:</p>
	<input type="radio" name="tamano" id="mini" value="Mini">
	<label for="tamano">Mini (sin recargo)</label><br>
	<input type="radio" name="tamano" id="mediano" value="Mediano">
	<label for="tamano">Mediano (+10%)</label><br>
	<input type="radio" name="tamano" id="torre" value="Torre">
	<label for="tamano">Torre (+20%)</label><br>
	
	<br>
	<input type="submit" value="Continuar">
	</form>
</body>
</html>
