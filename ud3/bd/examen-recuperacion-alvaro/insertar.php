<?php
require 'funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aeropuerto de Arcos - Insercción de vuelos</title>
</head>
<body>
    <h1>Aeropuerto de Arcos</h1>
    <h2>Inserción de vuelo</h2>
    <?php
        echo "<form action='insertar.php' method='post'>";
        echo "<label for='codigo'>Código de vuelo:</label><br>";
        echo "<input type='text' name='codigo' id='codigo'><br>";
        echo "<label for='destino'>Destino: </label>";
        $vuelos = leer("vuelos.txt");
        #var_dump($vuelos);
        echo "<select name='destino'>";
        foreach($vuelos as $vuelo)
        {
            echo "<option value='$vuelo'>$vuelo</option>";
        }
        echo "</select>";
        echo "<label for='aerolinea'> Aerolínea: </label>";
        echo "<input type='text' name='aerolinea' id='aerolinea'><br>";
        echo "<label for='puerta'>Puerta: </label>";
        echo "<input type='text' name='puerta' id='puerta'>";
        echo "<label for='hora_salida'>Hora de salida: </label>";
        echo "<input type='time' name='hora_salida' id='hora_salida'><br>";
        echo "<label for='retraso'>Retraso (minutos): </label>";
        echo "<input type='number' name='retraso' id='retraso' min=0 placeholder=0><br>";
        echo "<label for='estado'>Estado: </label>";
        echo "<select name='estado'>";
        echo "<option value='a_tiempo'>A tiempo</option>";
        echo "<option value='retrasado'>Retrasado</option>";
        echo "<option value='cancelado'>Cancelado</option>";
        echo "</select><br>";
        echo "<input type='submit' name='anadir' value='Añadir vuelo'>";
        echo "</form><br>";
        echo "<footer>";
        echo "<a href='index.php'>Volver al inicio</a><br>";
        echo "</footer>";

        if (isset($_POST['anadir']))
        {
            $codigo = $_POST['codigo'];
            $destino = $_POST['destino'];
            $aeorolinea = $_POST['aerolinea'];
            $puerta = $_POST['puerta'];
            $hora_salida = $_POST['hora_salida'];
            $retraso = $_POST['retraso'];
            $estado = $_POST['estado'];

            $pdo = conecta("aeropuerto");

            $insertar = $pdo->prepare("INSERT INTO vuelos (codigo_vuelo, destino, aerolinea, puerta, hora_salida, retraso,estado) VALUES (?,?,?,?,?,?,?)");
            $insertar->bindParam(1,$codigo);
            $insertar->bindParam(2,$destino);
            $insertar->bindParam(3,$aeorolinea);
            $insertar->bindParam(4,$puerta);
            $insertar->bindParam(5,$hora_salida);
            $insertar->bindParam(6,$retraso);
            $insertar->bindParam(7,$estado);
            $insertar->execute();
        }
    ?>
</body>
</html>