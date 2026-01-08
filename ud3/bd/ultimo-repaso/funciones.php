<?php
function conecta($nombre_fichero,$clave="")
{
    $handler = fopen($nombre_fichero);

    $fgets($handler); // Para quitar la cabecera
    $host = trim(fgets($handler));
    $usuario = trim(fgets($handler));
    $dbname = trim(fgets($handler));

    fclose($handler);

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