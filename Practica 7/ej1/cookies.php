<?php
if (isset($_POST['tema'])) {
    $tema = $_POST['tema'];
    setcookie('tema', $tema, time() + (30 * 24 * 60 * 60));
} elseif (isset($_COOKIE['tema'])) {
    $tema = $_COOKIE['tema'];
} else {
    $tema = 'claro';
}

$cssRuta = "estilos/" . $tema . ".css";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Selector de Estilo</title>
    <link rel="stylesheet" href="<?php echo $cssRuta; ?>">
</head>
<body>
    <h1>Bienvenido</h1>
    <p>Elige un estilo visual para la página:</p>

    <form method="post">
        <select name="tema">
            <option value="claro" <?php if ($tema == 'claro') echo 'selected'; ?>>Claro</option>
            <option value="oscuro" <?php if ($tema == 'oscuro') echo 'selected'; ?>>Oscuro</option>
        </select>
        <button type="submit">Aplicar Estilo</button>
    </form>
</body>
</html>
