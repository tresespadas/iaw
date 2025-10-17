<!DOCTYPE html>
<!-- Pedido de comida a domicilio
	- Nombre
	- Teléfono
	- Dirección
	- Número de menú
	Comidas para seleccionar (se pueden elegir varias):
	- Ensalada 7€
	- Pizza 12€
	- Montadito 3€
	- Postre 2.5€
	Y al final se elige el tamaño:
	- Pequeño
	- Grande (Vale 2€ más)

	Hacer un formulario para realizar el pedido
	Hacer un fichero php para procesarlo que te muestre la información introducida por el cliente y el precio total del pedido -->

<html>
<head>
	<meta charset="UTF-8">
	<title>Formulario</title>
</head>
<body>
	<form action="formulario2.php" method="post">
		<h2>Pedido de comida a domicilio</h2>
		<h3>Datos</h3>
		<p>Nombre: <input type="text" name="nombre" size="30" required></p>
		<p>Número de teléfono: <input type="tel" name="telef" size="30" required></p>
		<p>Dirección: <input type="text" name="direc" size="50" required></p>
		<p>Número de menús: <input type="number" name="num-menu" size="50" required></p>
		<p><input type="checkbox" name="ensalada">Ensalada</p>
		<p><input type="checkbox" name="pizza">Pizza</p>
		<p><input type="checkbox" name="montadito">Montadito</p>
		<p><input type="checkbox" name="postre">Postre</p>
		<p><select name="tamano">
			<option value="peque">Pequeño</option>
			<option value="grande">Grande</option>
		</select>
		</p>
		<input type="submit" value="Enviar">
		<input type="reset" value="Reset">
	</form>

	<?php
		$nombre_cliente=$_POST['nombre'];
		$telefono_cliente=$_POST['telef'];
		$direccion_cliente=$_POST['direc'];
		$num_menu=$_POST['num-menu'];
		$tam=$_POST['tamano'];
		$total=0;
		echo "<p>Nuevo cliente con nombre $nombre_cliente, con teléfono $telefono_cliente, y dirección $direccion_cliente.</p>";
		echo "<p>Quiere $num_menu menú(s) $tam(s) con:";
		echo"<ul>";
			if (isset($_POST['ensalada']))
			{
				echo "<li>Ensalada</li>";
				if ($_POST['tamano']=="grande")
				{
					$total = $total + 9;
				} else
				{
					$total = $total + 7;
				}
			}
			if (isset($_POST['pizza']))
			{
				echo "<li>Pizza</li>";
				if ($_POST['tamano']=="grande")
				{
					$total = $total + 14;
				} else
				{
					$total = $total + 12;
				}
			}
			if (isset($_POST['montadito']))
			{
				echo "<li>Montadito</li>";
				if ($_POST['tamano']=="grande")
				{
					$total = $total + 5;
				} else
				{
					$total = $total + 3;
				}
			}
			if (isset($_POST['postre']))
			{
				echo "<li>Postre</li>";
				if ($_POST['tamano']=="grande")
				{
					$total = $total + 5.5;
				} else
				{
					$total = $total + 2.5;
				}
			}
		echo"</ul>";
		echo "El precio total del pedido es <strong>".($total*$num_menu)."</strong> euros."
	?>
