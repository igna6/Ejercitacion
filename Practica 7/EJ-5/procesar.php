<?php
session_start();

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$_SESSION['usuario'] = $usuario;
$_SESSION['clave'] = $clave;

header("Location: mostrar.php");
exit();
