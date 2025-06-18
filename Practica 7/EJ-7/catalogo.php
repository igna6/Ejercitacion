<?php
session_start();

$conexion = new mysqli("localhost", "root", "", "Compras");
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

$resultado = $conexion->query("SELECT * FROM catalogo");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Catálogo de Productos</title>
</head>

<body>
  <h2>Catálogo de Productos</h2>
  <table border="1" cellpadding="10">
    <tr>
      <th>Producto</th>
      <th>Precio</th>
      <th>Acción</th>
    </tr>

    <?php while ($fila = $resultado->fetch_assoc()) { ?>
      <tr>
        <td><?php echo htmlspecialchars($fila['producto']); ?></td>
        <td><?php echo number_format($fila['precio'], 2); ?></td>
        <td><a href="agregar.php?id=<?php echo $fila['id']; ?>">Agregar al carrito</a></td>
      </tr>
    <?php } ?>

  </table>

  <br>
  <a href="carrito.php">Ver Carrito</a>
</body>

</html>

<?php
$conexion->close();
?>