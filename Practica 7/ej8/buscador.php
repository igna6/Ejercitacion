<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscador de Canciones</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h1>Buscador de Canciones</h1>

<form method="GET" action="">
    <input type="text" name="buscar" placeholder="Ingrese el nombre de la canción...">
    <input type="submit" value="Buscar">
</form>

<div class="resultado">
<?php
if (isset($_GET['buscar'])) {
    $busqueda = $conexion->real_escape_string($_GET['buscar']);
    $sql = "SELECT * FROM buscador WHERE canciones LIKE '%$busqueda%'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<h3>Resultados:</h3><ul>";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($fila['canciones']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No se encontraron canciones.";
    }
}
?>
</div>

</body>
</html>