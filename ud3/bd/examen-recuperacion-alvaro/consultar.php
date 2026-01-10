<?php
require 'funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aeropuerto de Arcos - Búsqueda de vuelos</title>
    <style>
        table, tr, th, td
        {
            border: 2px, solid, black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>Aeropuerto de Arcos</h1>
    <h2>Búsqueda de vuelos</h2>
    <?php
        echo "<form action='consultar.php' method='post'>";
        echo "<label for='destino'>Destino:</label><br>";
        $vuelos = leer("vuelos.txt");
        echo "<select name='destino'>";
        foreach($vuelos as $vuelo)
        {
            echo "<option value='$vuelo'>$vuelo</option>";
        }
        echo "<option value='todos'>--Todos--</option>";
        echo "</select><br>";
        echo "<br>";
        echo "<label for='estado'>Estado:</label><br>";
        echo "<input type='radio' name='estado' id='estado' value='a_tiempo'>A tiempo<br>";
        echo "<input type='radio' name='estado' id='estado' value='retrasado'>Retrasado<br>";
        echo "<input type='radio' name='estado' id='estado' value='cancelado'>Cancelado<br>";
        echo "<input type='radio' name='estado' id='estado' value='todos'>Todos<br>";
        echo "<br>";
        echo "<label for='aerolinea'>Aerolínea: </label><br>";
        echo "<input type='text' name='aerolinea' id='aerolinea' placeholder='Ej. Iberia'>";
        echo "<br>";
        echo "<input type='submit' name='buscar' value='Buscar vuelos'>";
        echo "</form><br>";
        echo "<footer>";
        echo "<a href='index.php'>Volver al inicio</a><br>";
        echo "</footer>";

        if (isset($_POST['buscar']))
        {
            #$codigo = $_POST['codigo'];
            $destino = $_POST['destino'];
            $aeorolinea = $_POST['aerolinea'];
            #$puerta = $_POST['puerta'];
            #$hora_salida = $_POST['hora_salida'];
            #$retraso = $_POST['retraso'];
            $estado = $_POST['estado'];

            $pdo = conecta("aeropuerto");

            echo "<table>";
            echo "<tr>";
            echo "<th>Código de vuelo</th>";
            echo "<th>Destino</th>";
            echo "<th>Aerolínea</th>";
            echo "<th>Puerta</th>";
            echo "<th>Hora de salida</th>";
            echo "<th>Retraso (minutos)</th>";
            echo "<th>Estado</th>";
            echo "</tr>";
            if (($destino == "todos") && ($estado == "todos"))
            {
                $buscar = $pdo->query("SELECT codigo_vuelo, destino, aerolinea, puerta, hora_salida, retraso,estado FROM vuelos");

                while($fila = $buscar->fetch())
                {
                    echo "<tr>";
                    echo "<td>$fila[codigo_vuelo]</td>";
                    echo "<td>$fila[destino]</td>";
                    echo "<td>$fila[aerolinea]</td>";
                    echo "<td>$fila[puerta]</td>";
                    echo "<td>$fila[hora_salida]</td>";
                    echo "<td>$fila[retraso]</td>";
                    echo "<td>$fila[estado]</td>";
                    echo "</tr>";
                }
            }
            elseif ($destino == "todos")
            {
                $buscar = $pdo->query("SELECT codigo_vuelo, destino, aerolinea, puerta, hora_salida, retraso,estado FROM vuelos WHERE estado = '$estado'");

                while($fila = $buscar->fetch())
                {
                    echo "<tr>";
                    echo "<td>$fila[codigo_vuelo]</td>";
                    echo "<td>$fila[destino]</td>";
                    echo "<td>$fila[aerolinea]</td>";
                    echo "<td>$fila[puerta]</td>";
                    echo "<td>$fila[hora_salida]</td>";
                    echo "<td>$fila[retraso]</td>";
                    echo "<td>$fila[estado]</td>";
                    echo "</tr>";
                }
            }
            elseif ($estado == "todos")
            {
                $buscar = $pdo->query("SELECT codigo_vuelo, destino, aerolinea, puerta, hora_salida, retraso,estado FROM vuelos WHERE destino = '$destino'");

                while($fila = $buscar->fetch())
                {
                    echo "<tr>";
                    echo "<td>$fila[codigo_vuelo]</td>";
                    echo "<td>$fila[destino]</td>";
                    echo "<td>$fila[aerolinea]</td>";
                    echo "<td>$fila[puerta]</td>";
                    echo "<td>$fila[hora_salida]</td>";
                    echo "<td>$fila[retraso]</td>";
                    echo "<td>$fila[estado]</td>";
                    echo "</tr>";
                }
            }
            else
            {
                $buscar = $pdo->query("SELECT codigo_vuelo, destino, aerolinea, puerta, hora_salida, retraso,estado FROM vuelos WHERE destino = '$destino' AND estado = '$estado'");

                while($fila = $buscar->fetch())
                {
                    echo "<tr>";
                    echo "<td>$fila[codigo_vuelo]</td>";
                    echo "<td>$fila[destino]</td>";
                    echo "<td>$fila[aerolinea]</td>";
                    echo "<td>$fila[puerta]</td>";
                    echo "<td>$fila[hora_salida]</td>";
                    echo "<td>$fila[retraso]</td>";
                    echo "<td>$fila[estado]</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
        }
    ?>
</body>
</html>