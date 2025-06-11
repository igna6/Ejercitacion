<!DOCTYPE html>
<html>
<head>
    <title>Modificación de Ciudad</title>
</head>
<body>
<?php
include("conexion.inc");

// Captura datos desde el formulario anterior
$vID = $_POST['ID'];
$vNombre = $_POST['Nombre'];
$vProvincia = $_POST['Provincia'];
$vHabitantes = $_POST['Habitantes'];

// Arma la instrucción SQL para actualizar la ciudad
$vSql = "UPDATE ciudades 
         SET nombre = '$vNombre', provincia = '$vProvincia', habitantes = $vHabitantes 
         WHERE id = $vID";

mysqli_query($link, $vSql) or die(mysqli_error($link));

echo("La ciudad fue modificada correctamente.<br>");
echo("<a href='Menu.html'>Volver al menú del ABM</a>");

// Cierra la conexión
mysqli_close($link);
?>
</body>
</html>
