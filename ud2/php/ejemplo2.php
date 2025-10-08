<html>
<head>
        <meta charset="UTF-8">
        <meta name="keywords" content="ejemplo, tonteria">
        <meta name="description" content="Ejemplo de bucles y condicionales">
        <meta name="author" content="Álvaro C A">
</head>
<body>
<h1>Ejemplo de condicional</h1>
<?php
        $edad=$_GET['edad'];
        $lugar=$_GET['lugar'];
        if ($edad<18 && $lugar=="jerez")
        {
                echo "Eres menor de edad y de jerez";
        }
        else if ($edad<18 && $lugar!="jerez")
        {
                echo "Eres menor de edad y de fuera";
        }
	else
	{
		echo "Otra cosa";
	}
?>
<h2>Bucles</h2>
<ul>
<?php
//Programa que escriba hola 10 veces
$numero=$_GET['tope'];
for ($i=1; $i<=$numero; $i++)
{
	echo "<li>".$i."-hola"."</li>";
}
echo "</ul>";
?>
</body>
</html>


