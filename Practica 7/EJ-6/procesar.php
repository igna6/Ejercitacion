<?php
session_start();

$conexion = new mysqli("localhost", "root", "", "base2");

if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

$mail = $_POST['mail'];

$sql = "SELECT nombre FROM alumnos WHERE mail = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $mail);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
  $stmt->bind_result($nombre);
  $stmt->fetch();

  $_SESSION['nombre'] = $nombre;

  echo "<h2>Bienvenido $nombre</h2>";
  echo '<a href="bienvenida.php">Ir a página de bienvenida</a>';
} else {
  echo "<h2>El mail no existe en la base de datos</h2>";
  echo '<a href="login.html">Intentar de nuevo</a>';
}

$stmt->close();
$conexion->close();
