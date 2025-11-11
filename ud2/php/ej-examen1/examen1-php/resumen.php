<?php
session_start();
if ($_POST['acepto-cookie']=='on')
{
	//Esto no funciona, no recuerdo bien cómo era lo de setcookie
	//setcookie('cookie')=$_SESSION['nom-cliente'];
}

$precio = [ "Procesador" => 200, "Tarjeta Gráfica" => 300, "Memoria RAM" => 100, "Disco SSD" => 120, "Fuente" => 80, "Placa base" => 150, "Refrigeración" => 60 ];

//function calcularPrecio($precio, $_SESSION['num-compo'], $_SESSION['tamano']) /* ESTO ES EL NOMBRE DE LA VARIABLE EN LA FUNCIÓN MAL!!!*/
function calcularPrecio($precio, $num, $tam)
{
	$precio_total=0;
	for ($i=1; $i<=$_SESSION['num-compo']; $i++)
	{
		if ($_POST['comp'.$i] == 'Procesador')
		{
			$precio_total = $precio_total + $precio['Procesador'];
		}else if ($_POST['comp'.$i] == 'Tarjeta Gráfica')
		{
			$precio_total = $precio_total + $precio['Tarjeta Gráfica'];
		}else if ($_POST['comp'.$i] == 'Memoria RAM')
		{
			$precio_total = $precio_total + $precio['Memoria RAM'];
		}else if ($_POST['comp'.$i] == 'Disco SSD')
		{
			$precio_total = $precio_total + $precio['Disco SSD'];
		}else if ($_POST['comp'.$i] == 'Fuente')
		{
			$precio_total = $precio_total + $precio['Fuente'];
		}else if ($_POST['comp'.$i] == 'Placa base')
		{
			$precio_total = $precio_total + $precio['Placa base'];
		}else if ($_POST['comp'.$i] == 'Refrigeración')
		{
			$precio_total = $precio_total + $precio['Refrigeración'];
		}
	}
	if ($_SESSION['tamano']=='Mediano')
	{
		$precio_total = $precio_total*1.1;
	}else if ($_SESSION['tamano'] == 'Torre')
	{
		$precio_total = $precio_total*1.2;
	}

	return $precio_total;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pedido de ordenador</title>
</head>
<body>
	<h1>Resumen del pedido</h1>
	<?php
	echo "<strong>Cliente: </strong>";
	echo $_SESSION['nom-cliente'];

	echo "<br>";
	echo "<strong>Ciudad: </strong>";
	echo $_POST['ciudad'];

	echo "<br>";
	echo "<strong>Tamaño del equipo: </strong>";
	echo $_SESSION['tamano'];

	echo "<br>";
	echo "<strong>Componentes elegidos: </strong>";
	echo "<ul>";
	for ($i=1; $i<=$_SESSION['num-compo']; $i++)
	{
		echo "<li>{$_POST['comp'.$i]}</li><br>";
	}
	echo "</ul>";
	
	#echo "<pre>";
	#var_dump($precio);
	#echo "</pre>";

	// No entran bien los parámetros en la función. No entiendo por qué.
	//$precio_final=calcularPrecio($precio, $_SESSION['num-compo'], $_SESSION['tamano']);
	echo "$precio_final";
	?>
	
</body>
</html>
