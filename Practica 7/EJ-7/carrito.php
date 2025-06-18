<?php
session_start();

$conexion = new mysqli("localhost", "root", "", "Compras");
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();

if (empty($carrito)) {
  echo "<h2>El carrito está vacío.</h2>";
  echo '<a href="catalogo.php">Volver al catálogo</a>';
  exit();
}

$items = array_count_values($carrito);

echo "<h2>Carrito de Compras</h2>";
echo '<table border="1" cellpadding="10">';
echo '<tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th></tr>';

$total = 0;

foreach ($items as $idProducto => $cantidad) {
  $stmt = $conexion->prepare("SELECT producto, precio FROM catalogo WHERE id = ?");
  $stmt->bind_param("i", $idProducto);
  $stmt->execute();
  $stmt->bind_result($producto, $precio);
  $stmt->fetch();

  $subtotal = $precio * $cantidad;
  $total += $subtotal;

  echo "<tr>";
  echo "<td>" . htmlspecialchars($producto) . "</td>";
  echo "<td>" . number_format($precio, 2) . "</td>";
  echo "<td>" . $cantidad . "</td>";
  echo "<td>" . number_format($subtotal, 2) . "</td>";
  echo "</tr>";

  $stmt->close();
}

echo "<tr><td colspan='3'><strong>Total</strong></td><td><strong>" . number_format($total, 2) . "</strong></td></tr>";
echo "</table>";
echo "<br>";
echo '<a href="catalogo.php">Seguir comprando</a> | ';
echo '<a href="vaciar.php">Vaciar carrito</a>';

$conexion->close();
