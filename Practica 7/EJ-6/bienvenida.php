<?php
session_start();

if (isset($_SESSION['nombre'])) {
  $nombre = $_SESSION['nombre'];
  echo "<h2>Bienvenido nuevamente, $nombre</h2>";
} else {
  echo "<h2>No tiene permiso para visitar esta página.</h2>";
  echo '<a href="login.html">Volver al login</a>';
}
