<?php
function comprobar_nombre($nombre_usuario){
    if (strlen($nombre_usuario) < 3 || strlen($nombre_usuario) > 20) {
        echo $nombre_usuario . " no es válido<br>";
        return false;
    }

    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
    for ($i = 0; $i < strlen($nombre_usuario); $i++) {
        if (strpos($permitidos, substr($nombre_usuario, $i, 1)) === false) {
            echo $nombre_usuario . " no es válido <br> ";
            return false;
        }
    }

    echo $nombre_usuario . " es válido<br>";
    return true;
}

// Pruebas:
comprobar_nombre("Juan");          // Válido
comprobar_nombre("jo");            // Muy corto
comprobar_nombre("usuario!123");   // Contiene carácter no permitido
comprobar_nombre("Nombre_Valido99"); // Válido
comprobar_nombre("usuario-con-muchos-caracteres-que-no-deberia"); // Muy largo
?>
