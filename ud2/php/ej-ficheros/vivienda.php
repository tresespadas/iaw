<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Inserción de vivienda</title>
	</head>
	<body>
		<h2>Inserción de vivienda</h2>
		<form>
			<fieldset>
				<label for="tipo_vivienda">Selecciona el tipo de vivienda: </label>
				<?php
				$fichero=fopen("tipo_vivienda.dat","r+");
				echo "<select name='tipo_vivienda'>";
					while (!feof($fichero))
					{
						$linea=fgets($fichero);
						if ($linea != "")
						{
							echo "<option value='$linea'>$linea</option>";
						}
					}
				echo "</select>";
				?>
				<br>
				<label for="zona">Selecciona la zona: </label>
				<select name="zona">
					<option value="centro">Centro</option>
					<option value="periferia">Periferia</option>
				</select>
				<br>
				<label for="direccion">Introduce dirección: </label>
				<input type="text" name="direccion" id="direccion">
				<br>
				<
			</fieldset>
		</form>
	</body>
</html>
