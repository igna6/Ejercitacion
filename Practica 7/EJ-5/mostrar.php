<?php
session_start();

if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])) {
  $usuario = $_SESSION['usuario'];
  $clave = $_SESSION['clave'];
} else {
  echo "No hay datos de sesión almacenados.";
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Mostrar Datos de Sesión</title>
</head>

<body>
  <h2>Bienvenido, <?php echo htmlspecialchars($usuario); ?>!</h2>
  <p>Su clave es: <?php echo htmlspecialchars($clave); ?></p>

</body>

</html>