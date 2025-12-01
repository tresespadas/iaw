<?php
function conecta($servidor,$bd,$usuario,$clave=""){
	try{
		$dsn = 'mysql:host='.$servidor.';dbname='.$bd;
		$pdo = new PDO($dsn,$usuario,$clave);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}catch (PDOException $e){
		return null;
	}
}

?>
