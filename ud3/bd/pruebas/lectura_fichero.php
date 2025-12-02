<?php
$archivo = fopen("archivo.txt","r");

while (!feof($archivo))
{
  $cabecera = fgets($archivo);
  $host = trim(fgets($archivo));
  $db = trim(fgets($archivo));
  $user = trim(fgets($archivo));
}

echo $cabecera;
echo $host;
echo $db;
echo $user;

fclose($archivo);
?>

