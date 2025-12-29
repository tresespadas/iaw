<?php
require 'funciones.php';
$num_tareas = 3;
$modulos = leer_modulos("mismodulos.txt");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="prueba_select.php" method="post">
        <?php
        for ($i=1; $i<=$num_tareas; ++$i)
        {
            echo "Tipo:<select name='selector$i'>";
            for ($j=0; $j<count($modulos); ++$j)
            {
                echo "<option value='$modulos[$j]'>$modulos[$j]</option>";
            }
            echo "</select>";
            echo "<br>";
        }
        echo "<input type='hidden' name= 'insertado' value='insertado'>";
        echo "<input type='submit' value='Enviar'>";
        ?>
    </form>

    <?php //POST-INSERTADO
        if (isset($_POST['insertado']))
        {
            for ($i=1; $i<=$num_tareas; ++$i)
            {
                echo $_POST["selector$i"];
            }
        }
    ?>
</body>
</html>