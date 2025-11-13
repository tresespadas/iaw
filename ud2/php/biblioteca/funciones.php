<?php
function escribir_select($fichero_lectura)
{
    $texto = "";
    $manejador = fopen($fichero_lectura,"r");
    if (!$manejador)
    {
        echo "No se puedo abrir el archivo de lectura";
        return;
    }
    while (!feof($manejador))
    {
        $linea = trim(fgets($manejador));
        if ($linea != "" && $linea != "TITULOS")
        {
            $texto .= "<option value='$linea'>$linea</option>";
        }
    }
    fclose($manejador);
    return $texto;
}

function calcularPrecio($precio,$libros_pedidos,$envio)
{
    $precio_total=0;
    foreach($libros_pedidos as $libros)
    {
        $precio_total = $precio_total + $precio["$libros"];
    }
    switch ($envio)
    {
        case "Estándar":
            $precio_total = $precio_total;
            break;
        case "Urgente":
            $precio_total = $precio_total * 1.1;
            break;
        case "Internacional":
            $precio_total = $precio_total * 1.25;
            break;
    }
    return $precio_total;
}
?>