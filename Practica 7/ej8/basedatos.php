<?php

$conexion = new mysqli("localhost", "root", "");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS prueba";
if ($conexion->query($sql) === TRUE) {
    echo "Base de datos 'prueba' creada correctamente.<br>";
} else {
    die("Error al crear la base de datos: " . $conexion->error);
}

$conexion->select_db("prueba");

$sql = "CREATE TABLE IF NOT EXISTS buscador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    canciones VARCHAR(255) NOT NULL
)";
if ($conexion->query($sql) === TRUE) {
    echo "Tabla 'buscador' creada correctamente.<br>";
} else {
    die("Error al crear la tabla: " . $conexion->error);
}

$sql = "INSERT INTO buscador (canciones) VALUES 
    ('Bohemian Rhapsody'),
    ('Imagine'),
    ('Hotel California'),
    ('Stairway to Heaven'),
    ('Californication')";
    
if ($conexion->query($sql) === TRUE) {
    echo "Canciones insertadas correctamente.";
} else {
    echo "Error al insertar canciones (puede que ya estén insertadas).";
}

$conexion->close();
?>