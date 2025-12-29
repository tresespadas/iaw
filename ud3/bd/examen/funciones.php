<?php
function conecta($bd)
{
    $host = "localhost";
    $usuario = "root";
    $clave = "";

    try
    {
        $dsn = 'mysql:host='.$host.';dbname='.$bd;
        $pdo = new PDO($dsn,$usuario,$clave);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        #echo "Conexión establecida";
        return $pdo;
    }
    catch (PDOException $e)
    {
        return null;
    }
}
?>