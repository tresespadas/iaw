<?php 
session_start();
include "funciones.php";
?>
<form action="login.php" method="post">
	<label for="nombre">Login: </label>
	<input type="text" name="login" id="nombre"><br>
	<label for="clave">Clave: </label>
	<input type="password" name="clave" id="clave"><br>
	<input type="submit" value="Acceder">
</form>

<?php 
if ($_POST['login']!= ""){
	$login = $_POST['login'];
	$pass = $_POST['clave'];
	$cifrado = hash('md5',$pass);
	//echo $cifrado;
	// Conecto con la base de datos
	
	$pdo = conecta("localhost","clase","root");
	if ($pdo == null){
		echo "Ha ocurrido un error al conectar";
		exit;
	}
	//echo "SELECT * FROM registro WHERE login = '$login' AND pass= '$cifrado'";
	$resultado = $pdo->prepare("SELECT * FROM registro WHERE login =? AND pass=?");
	$resultado->bindParam(1,$login);
	$resultado->bindParam(2,$cifrado);
	$resultado->execute();
	//var_dump($contenido);
	//var_dump($resultado);
	while ($fila = $resultado->fetch()){
		$_SESSION['acceso'] = true;
		header("Location:index.php");
	}
	echo "El usuario no está registrado";	

}

?>
