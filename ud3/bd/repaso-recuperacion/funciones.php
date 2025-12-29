<?php
function leer_modulos($nombre_archivo)
{
    $archivo = fopen($nombre_archivo, "r");

    fgets($archivo);
    $arr = [];
    while(!feof($archivo))
    {
        $linea = fgets($archivo);
        if ($linea == "")
        {
            break;
        }
        else
        {
            $arr[] = $linea;
        }
    }
    fclose($archivo);
    return $arr;
}

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
?>