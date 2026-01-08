<?php

function leer($nombre_archivo)
{
    $handler = fopen($nombre_archivo,"r");

    // Para quitarme el título
    fgets($handler);

    $arr = [];
    while(!feof($handler))
    {
        $clave = trim(fgets($handler));
        $valor = trim(fgets($handler));

        if ($clave == "")
        {
            break;
        }
        else
        {
            $arr[$clave] = $valor;
        }
    }
    fclose($handler);
    return $arr;
}
?>