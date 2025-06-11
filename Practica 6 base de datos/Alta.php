<html>
<head>
    <title>Alta Ciudad</title>
</head>
<body>
<?php
include("conexion.inc");

// Captura datos desde el Form anterior
$vCiudad = $_POST['Ciudad'];
$vPais = $_POST['Pais'];
$vHabitantes = $_POST['Habitantes'];
$vSuperficie = $_POST['Superficie'];
$vtieneMetro = isset($_POST['TieneMetro']) ? 1 : 0; // Checkbox o select binario

// Verificar si la ciudad ya existe (por nombre y país)
$vSql = "SELECT COUNT(*) as canti FROM ciudades WHERE ciudad='$vCiudad' AND pais='$vPais'";
$vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
$vCantCiudades = mysqli_fetch_assoc($vResultado);

if ($vCantCiudades['canti'] != 0) {
    echo "La ciudad ya existe.<br>";
    echo "<a href='Menu.html'>VOLVER AL ABM</a>";
} else {
    // Insertar la nueva ciudad
    $vSql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro) 
             VALUES ('$vCiudad', '$vPais', '$vHabitantes', '$vSuperficie', '$vtieneMetro')";
    
    mysqli_query($link, $vSql) or die(mysqli_error($link));
    echo "La ciudad fue registrada exitosamente.<br>";
    echo "<a href='Menu.html'>VOLVER AL MENU</a>";
}

// Cierre de conexión
mysqli_close($link);
?>
</body>
</html>
