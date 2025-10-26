<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pizzería Agapito - Crea tu pizza</title>
  </head>
  <body>
    <h1>Pizzería Agapito</h1>
		<form action="pedido_final.php" method="post">	
		<fieldset>
      <legend>Información Personal</legend>
      <p>
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required>
      </p>
      <p>
        <label for="localiadad">Localidad: </label>
          <select name="localidad">	
              <option value="arcos">Arcos de la frontera</option>
              <option value="paterna">Paterna</option>
              <option value="bornos">Bornos</option>
              <option value="jedula">Jédula</option>
              <option value="gibalbin">Gibalbín</option>
          </select>
      </p>
      <p>
          <label for="cookie">Acepto las cookies </label>
          <input type="checkbox" id="cookie" name="cookie">
      </p>
		</fieldset>

		<fieldset>
      <legend>Pedido</legend>
      <p>
        <label for="masa">Tipo de masa: </label>
        <select name="masa">
            <option value="tradi">Tradicional</option>	
            <option value="fina">Fina</option>	
            <option value="borde">Con bordes rellenos</option>	
        </select>
      </p>
      <p>Tamaño:<br>
          <label for="normal">Normal</label>
          <input type="radio" id="normal" name="tamano" value="normal">
          <label for="grande">Grande</label>
          <input type="radio" id="grande" name="tamano" value="grande">
          <label for="familiar">Familiar</label>
          <input type="radio" id="familiar" name="tamano" value="familiar">
      </p>
      <p>
      <?php
          $num_ingre=$_POST['ingre'];
          for ($i=1;$i<=$num_ingre;$i++)
          {
            echo "<label for='ingre$i'>Ingrediente $i:</label>";
            echo "<input type='text' id='ingre$i' name='ingre$i' required><br>";
            echo "<br>";
          }
      ?>
      </p>
		</fieldset>
    <input type="submit" name="Enviar">
		</form>	
  </body>
</html>
