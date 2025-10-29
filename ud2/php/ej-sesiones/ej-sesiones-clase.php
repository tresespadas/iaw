<?php
session_start();
?>

<form action="ej-sesiones-clase-b.php" method="post">
   <label for="nombre">Nombre:</label>
   <input type=text id="nombre" name="nombre">
   <input type=submit value=Enviar>
</form>

<?php
if (isset($_SESSION['minombre']))
{
   echo "Bienvenido {$_SESSION['minombre']}<br>";
   if (isset($_SESSION['numvisitas']))
   {
      $_SESSION['numvisitas']++;
   } else {
      $_SESSION['numvisitas'] = 1;
   }
   echo "Has visitado la página {$_SESSION['numvisitas']} veces";
   echo "<a href='cerrar-sesion.php'>Cerrar sesión</a>";
}
?>

