<html>
<head>
<title>Baja de Ciudad</title>
</head>
<body>
<?php
include ("conexion.inc");
$vId = $_POST['id'];
$vSql = "SELECT * FROM ciudades WHERE id='$vId' ";
$vResultado = mysqli_query($link, $vSql);
if(mysqli_num_rows($vResultado) == 0) {
    echo ("Ciudad Inexistente...!!! <br>");
    echo ("<A href='FormBajaIni.html'>Continuar</A>");
} else {
    $vSql= "DELETE FROM ciudades WHERE id = '$vId' ";
    mysqli_query($link, $vSql);
    echo("La Ciudad fue eliminada<br>");
    echo("<A href='Menu.html'>Volver al Menu del ABM</A>");
}
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
// Cerrar la conexion
mysqli_close($link);
?>
</body>
</html>