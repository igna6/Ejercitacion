<?php
if (isset($_COOKIE['contador'])) {
    $contador = $_COOKIE['contador'] + 1; 
    setcookie('contador', $contador, time() + (365 * 24 * 60 * 60));
    $mensaje = "Has visitado esta página $contador veces.";
} else {
    $contador = 1;
    setcookie('contador', $contador, time() + (365 * 24 * 60 * 60)); 
    $mensaje = "Es la primera vez que visitas esta página.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador de Visitas</title>
</head>
<body>
    <h1><?php echo $mensaje; ?></h1>
</body>
</html>
