<?php
function conecta($bd,$clave="")
{
    $host = "localhost";
    $usuario = "root";

    try
    {
        $dsn = 'mysql:host='.$host.';dbname='.$bd;
        $pdo = new PDO($dsn,$usuario,$clave);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        #echo "Conexión establecida.<hr>";
        return $pdo;
    }
    catch (PDOException $e)
    {
        echo "La conexión ha fallado por ".$e->getMessage();
    }
}

function leer($nombre_fichero) // Función para leer el fichero y volcarlo en un array
{
    $handler = fopen($nombre_fichero, "r");
    $arr = [];

    fgets($handler); // Primera lectura para quitarme el encabezado
    while (!feof($handler))
    {
        $cod = fgets($handler);
        $ciudad = fgets($handler);

        if ($cod == "")
        {
            break;
        }
        else
        {
            $linea = trim($ciudad);
            array_push($arr, $linea);
        }
    }
    fclose($handler);

    return $arr;
}
?>