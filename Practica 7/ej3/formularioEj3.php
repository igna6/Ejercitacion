<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre"])) {
    $nombreUsuario = $_POST["nombre"];

    setcookie("usuario", $nombreUsuario, time() + (7 * 24 * 60 * 60));
} else {

    $nombreUsuario = $_COOKIE["usuario"] ?? "";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario con Cookie</title>
</head>
<body>
    <h2>Formulario de Usuario</h2>

    <?php if (!empty($nombreUsuario)): ?>
        <p>Último nombre de usuario ingresado: <strong><?php echo htmlspecialchars($nombreUsuario); ?></strong></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="nombre">Nombre de usuario:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>

