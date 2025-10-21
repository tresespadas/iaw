<!DOCTYPE html>
<html>
<head>
	<title>Alumnos</title>
</head>
<body>
	<form action="procesa.php" method="post">
		<?php
		$num_alumnos=$_POST['cuantos'];
		for ($i=1;$i<=$num_alumnos;$i++)
		{
			echo "<label for='nombre$i'>Nombre $i:</label>";
			echo "<input type='text' id='nombre$i' name='nombre$i' required><br>";
		}
		
		?>
		<input type="hidden" value=<?php echo $num_alumnos;?> name="total">
		<input type="submit" value="Completar datos">
	</form>
</body>
</html>
