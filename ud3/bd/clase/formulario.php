<html>
<head>
</head>
<body>
	<h1> Inserción de datos </h1>
	<form action="formulario.php" method="post">
		<label for="nombre">Nombre</label>
		<input type="text" id="nombre" name="nombre" required pattern="[a-zA-Z]{3,5}"><br>
		<label for="ape">Apellido</label>
		<input type="text" id="ape" name="ape"><br>
		<label for="edad">Edad</label>
		<input type="number" id="edad" name="edad"><br>
		<input type="submit" value="Guardar en la BD">
	</form>
	<?php 
	if ($_POST['nombre']!= ""){
		$nombre = $_POST['nombre'];
		$apellido = $_POST['ape'];
		$edad = $_POST['edad'];
		
		$host="localhost";
		$usuario = "root";
		$clave = "";
		$bd = "clase";

		try{
			$dsn = 'mysql:host='.$host.';dbname='.$bd;
			$pdo = new PDO($dsn,$usuario,$clave);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// Crear la consulta de inserción;
			//$pdo->query("INSERT INTO alumnos (nombre,apellido1,edad) VALUES ('$nombre','$apellido',$edad)");
			$consulta = "INSERT INTO alumnos (nombre,apellido1,edad) VALUES (?,?,?)";
			$temp = $pdo->prepare($consulta);
			$temp->bindParam(1,$nombre); // Asociación de parámetros.
			$temp->bindParam(2,$apellido);
			$temp->bindParam(3,$edad);
			$temp->execute();

		}catch (PDOException $e){
			echo "La conexión ha fallado por ".$e->getMessage();
		}
	}
	
	?>
</body>
</html>
