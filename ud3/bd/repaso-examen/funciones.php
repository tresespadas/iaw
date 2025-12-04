<?php
function conecta($nombre_archivo, $clave="")
{
    $archivo = fopen($nombre_archivo,"r");
    fgets($archivo);
    $host = trim(fgets($archivo));
    $usuario = trim(fgets($archivo));
    $bd = trim(fgets($archivo));

    try
    {
        $dsn = "mysql:host=$host;dbname=$bd";
        $pdo = new PDO($dsn,$usuario,$clave);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        #echo "Conexión establecida";
        return $pdo;
    }
    catch (PDOException $e)
    {
        echo "La conexión ha fallado por ".$e->getMessage();
    }
    fclose($archivo);
}

function cargar($nombre_archivo)
{
    $pdo = conecta("conexion.txt");

    $archivo = fopen($nombre_archivo,"r");
    fgets($archivo);

    $insert = $pdo->prepare("INSERT INTO alumnos (nombre,apellido,nota) VALUES (?,?,?);");

    while(!feof($archivo))
    {
        $nombre = trim(fgets($archivo));
        if ($nombre == "")
        {
            break;
        }
        $apellido = trim(fgets($archivo));
        $nota = trim(fgets($archivo));
        if (fgets($archivo) == "")
        {
            continue;
        }
        $insert->execute([$nombre,$apellido,$nota]);
    }
    fclose($archivo);
}

function guardar($nombre_archivo)
{
    $pdo = conecta("conexion.txt");

    $lectura_datos= $pdo->query("SELECT nombre,apellido,nota FROM alumnos;");
    $datos = $lectura_datos->fetchAll(PDO::FETCH_ASSOC);
    #var_dump($datos);

    $archivo = fopen($nombre_archivo,"w");

    foreach($datos as $alumno)
    {
        fwrite($archivo,$alumno['nombre']."\n");
        fwrite($archivo,$alumno['apellido']."\n");
        fwrite($archivo,$alumno['nota']."\n");
    }

    fclose($archivo);
}
?>