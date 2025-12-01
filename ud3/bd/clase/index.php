<?php
session_start();

?>
<html>

<head>
</head>
<body>
  <a href="formulario.php">Insertar alumnos</a>
  <br>
  <a href="conexion.php">Listar alumnos</a>
  <br>
  <?php if ($_SESSION['acceso']){
  echo "<a href='desconecta.php'>Desconectar</a>";
  }else{
   echo "<a href='login.php'>Login</a>";
  }
  ?>
  
</html>
