<!DOCTYPE html>
<html>
<head>
	<title>Tablas de multiplicar</title>
	<style>
		table, tr, th, td {border: 1px solid black;
					border-collapse: collapse;
		}
	</style>
</head>
<body>
	<?php
		$tope=$_GET['tope'];
		echo "<table>";
		echo "<tr>";
		for ($i=1;$i<=10;$i++)
		{
			if ($i==0)
			{
				echo "<th></th>";
			} else
			{
				echo "<th>$i</th>";
			}
		}
		echo "</tr>";
		for ($i=1;$i<=$tope;$i++)
		{
			echo "<tr>";
			for ($j=1;$j<=10;$j++)
			{
				if ($j==0)
				{
					echo "<th>$i</th>";
				} else
				{
					echo "<td>$i x $j = ".$i*$j."</td>";
				}
			}
		echo "</tr>";
		}
		echo "</table>";
	?>
</body>
</html>
