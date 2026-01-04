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
        //echo "Conectado a la base de datos";
        return $pdo;
    }
    catch (PDOException $e)
    {
        return null;
    }
}

function leer_tipos($nombre_archivo)
{
    $handler = fopen($nombre_archivo, "r");

    fgets($handler);
    $arr = [];
    while(!feof($handler))
    {
        $linea = fgets($handler);
        if ($linea == "")
        {
            break;
        }
        else
        {
            #$arr[] = $linea;
            array_push($arr, $linea);
        }
    }
    fclose($handler);
    
    return $arr;
}
?>