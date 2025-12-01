<?php

$host="localhost";
$usuario = "root";
$clave = "";
$bd = "huellas";

try{
	$dsn = 'mysql:host='.$host.';dbname='.$bd;
	$pdo = new PDO($dsn,$usuario,$clave);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Conexión establecida.<hr>";


}catch (PDOException $e){
	echo "La conexión ha fallado por ".$e->getMessage();
}

//Cojo los datos para insertar del formulario
$nombre = "Petra";
$apellido = "Puerro";
$insercion = "INSERT INTO cliente (nombre, apellido) VALUES (?,?)";
$consulta = $pdo->prepare($insercion);
$consulta->bindParam(1,$nombre);
$consulta->bindParam(2,$apellido);
$consulta->execute();

echo "Datos insertados correctamente";
?>
