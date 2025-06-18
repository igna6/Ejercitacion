<?php
$cookie_eliminada = false;


if (isset($_COOKIE['tipo_titular'])) {

  setcookie('tipo_titular', '', time() - 3600, '/');
  $cookie_eliminada = true;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Limpiar Cookies - El Diario Digital</title>
</head>

<body>
  <header>
    <h1>Gestión de Cookies</h1>
  </header>

  <div>
    <nav>
      <a href="index.php">Volver al Inicio</a>
      <a href="configuracion.php">Configurar Preferencias</a>
      <a href="limpiar_cookies.php">Limpiar Cookies</a>
    </nav>
    <h3>Preferencias reiniciadas</h3>
    <nav>
      <a href="index.php">