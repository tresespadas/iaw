<?php
session_start();
require 'funciones.php';

# Array con los precios
$precios = ["El Señor de los Anillos" => 25,
"Cien años de soledad" => 18,
"1984" => 20,
"Don Quijote de la Mancha" => 22,
"Crónica de una muerte anunciada" => 15]

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido de libros - BookPlanet</title>
</head>
<body>
    <?php
    echo "<h2>Resumen del pedido para el cliente {$_SESSION['nombre_cliente']}</h2>";

    # Cliente
    echo "<p>Cliente: ";
    echo $_SESSION['nombre_cliente'];
    echo "</p>";

    # Correo
    echo "<p>Correo: ";
    echo $_SESSION['email'];
    echo "</p>";

    # Ciudad:
    echo "<p>Ciudad: ";
    echo $_SESSION['ciudad'];
    echo "</p>";

    # Método de envío:
    echo "<p>Método de envío: ";
    echo $_POST['envio'];
    echo "</p>";

    # Libros elegidos:
    $num_libros = $_SESSION["numero_libros"];
    echo "<p>Libros elegidos: <br>";
    $libros_pedidos=[];
    echo "<ul>";
    for ($i=1; $i<=$num_libros; $i++)
    {
        $libros_pedidos[] = $_POST["lib$i"];
        echo "<li>".$_POST["lib$i"]."</li>";
        echo "<br>";
    }
    echo "</ul>";

    # Total:
    echo "<p>Total: ";
    $total = calcularPrecio($precios,$libros_pedidos,$_POST['envio']);
    echo $total."€";
    echo "</p>";
    
    # Escribir en pedidos.txt
    $fichero=fopen("pedidos.txt","a+");
    fwrite($fichero,"Cliente: {$_SESSION['nombre_cliente']}"."\n");
    fwrite($fichero,"Email: {$_SESSION['email']}"."\n");
    fwrite($fichero,"Ciudad: {$_SESSION['ciudad']}"."\n");
    fwrite($fichero,"Método de envío: {$_POST['envio']}"."\n");
    fwrite($fichero,"Libros elegidos:"."\n");
    for ($i=1; $i<=$num_libros; $i++)
    {
        fwrite($fichero,$_POST["lib$i"]."\n");
    }
    fwrite($fichero,"Total a pagar: ".$total."€"."\n");
    fclose($fichero);
    ?>
    
</body>
</html>