<?php
session_start();

if (!isset($_GET['id'])) {
  header("Location: catalogo.php");
  exit();
}

$id = (int)$_GET['id'];

if (!isset($_SESSION['carrito'])) {
  $_SESSION['carrito'] = array();
}

$_SESSION['carrito'][] = $id;

header("Location: catalogo.php");
exit();
