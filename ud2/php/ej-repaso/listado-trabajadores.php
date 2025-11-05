<?php
session_start();
function retencion($sueldo, $nat)
{
  $retencion=0;
  if ($nat == "espanola")
  {
    $retencion=$sueldo*0.25;
  } else {
    $retencion=$sueldo*0.15;
  }
  return $retencion;
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de trabajadores</title>
  </head>
  <body>
    <h1>Listado de trabajadores</h1>
    <?php
    $num_trab=$_SESSION['s-num_trab'];
    $multidimensional=[];
    for ($i=1; $i<=$num_trab; $i++)
    {
      $nombre=$_POST['nom-trab'.$i];
      $nat=$_POST['nat'.$i];
      $sueldo=$_POST['sueldo'.$i];
      $datos = [ 'nombre' => $nombre, 'nat' => $nat, 'sueldo' => $sueldo];
      array_push($multidimensional, $datos);
    }
    #echo "<pre>";
    #var_dump($multidimensional);
    #echo "</pre>";
    foreach ($multidimensional as $trabajador)
    {
      $ret=retencion($trabajador['sueldo'],$trabajador['nat']);
      echo "El trabajador {$trabajador['nombre']} tiene una retención de {$ret}.<br>";
    }
    ?>
  </body>
</html>
