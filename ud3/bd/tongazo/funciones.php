<?php
function conecta($servidor,$bd,$usuario,$clave="")
{
  try
  {
    $dsn = "mysql:host=$servidor;dbname=$bd";
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
