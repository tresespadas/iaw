<?php

echo "<ul>";
for ($i=1;$i<=$_POST['total'];$i++)
{
	echo "<li>".$_POST['nombre'.$i]."</li>";
}
echo "</ul>";

?>
