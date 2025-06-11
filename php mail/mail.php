<?php
$destinatario = "ignacio6bruzzesi@gmail.com";
$asunto = "Correo de prueba con HTML";
$remitente = "ignaciobruzzesi@hotmail.com";
$nombre_remitente = "Ignacio Bruzzesi";


$mensaje_texto = "Mensaje de prueba php";

$headers = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/html; charset=UTF-8";
$headers[] = "From: $nombre_remitente <$remitente>";
$headers[] = "Reply-To: $remitente";
$headers[] = "X-Mailer: PHP/" . phpversion();

$enviado = mail($destinatario, $asunto, $mensaje_html, implode("\r\n", $headers));

if ($enviado) {
    echo "✅ Correo enviado exitosamente a $destinatario";
} else {
    echo "❌ Error al enviar el correo";
}
?> 