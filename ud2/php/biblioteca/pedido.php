<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido de libros - BookPlanet</title>
</head>
<body>
    <h2>Pedido de libros - BookPlanet</h2>
    <form action="pedido_libros.php" method="post">
        <label for="nombre_cliente">Nombre del cliente: </label>
        <input type="text" name="nombre_cliente" id="nombre_cliente" required>
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">

        <br>
        <label for="numero_libros">Número de libros a pedir: </label>
        <input type="number" name="numero_libros" id="numero_libros" min=1 max=5 required>

        <br>
        <label for="ciudad">Ciudad de envío: </label>
        <input type="text" name="ciudad" id="ciudad">

        <br>
        <label for="cookie">Guardar mi nombre en una cookie</label>
        <input type="checkbox" name="cookie" id="cookie" value="true">

        <br>
        <input type="submit" value="Continuar pedido">
    </form>
    
</body>
</html>