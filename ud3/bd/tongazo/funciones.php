<?php
function conecta($nombre_del_fichero,$clave="")
{
  $archivo = fopen($nombre_del_fichero,"r");

  $cabecera = fgets($archivo); // Para eliminar la cabecera

  $host = trim(fgets($archivo));
  $dbname = trim(fgets($archivo));
  $usuario = trim(fgets($archivo));

  fclose($archivo);

  try
  {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $pdo = new PDO($dsn,$usuario,$clave);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    #echo "Conexión establecida";
    return $pdo;
  }
  catch (PDOException $e)
  {
    echo "La conexión ha fallado por ".$e->getMessage();
    return NULL;
  }
}
?>

