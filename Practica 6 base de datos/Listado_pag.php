<html>
<head>
    <title>Listado de Ciudades con Paginación</title>
</head>
<body>
<?php
include("conexion.inc");

// Cantidad de registros por página
$Cant_por_Pag = 2;
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Cálculo del inicio del registro
$inicio = ($pagina - 1) * $Cant_por_Pag;

// Consulta total de registros
$vSqlTotal = "SELECT * FROM Ciudades";
$vResultadoTotal = mysqli_query($link, $vSqlTotal);
$total_registros = mysqli_num_rows($vResultadoTotal);
$total_paginas = ceil($total_registros / $Cant_por_Pag);

echo "Número de registros encontrados: " . $total_registros . "<br>";
echo "Se muestran páginas de " . $Cant_por_Pag . " registros cada una<br>";
echo "Mostrando la página " . $pagina . " de " . $total_paginas . "<p>";

// Consulta paginada
$vSql = "SELECT * FROM Ciudades LIMIT $inicio, $Cant_por_Pag";
$vResultado = mysqli_query($link, $vSql);
?>

<table border="1">
<tr>
    <td><b>ID</b></td>
    <td><b>Ciudad</b></td>
    <td><b>País</b></td>
    <td><b>Habitantes</b></td>
    <td><b>Superficie</b></td>
    <td><b>Tiene Metro</b></td>
</tr>

<?php
while ($fila = mysqli_fetch_array($vResultado)) {
?>
<tr>
    <td><?php echo $fila['id']; ?></td>
    <td><?php echo $fila['ciudad']; ?></td>
    <td><?php echo $fila['pais']; ?></td>
    <td><?php echo $fila['habitantes']; ?></td>
    <td><?php echo $fila['superficie']; ?></td>
    <td><?php echo $fila['tieneMetro']; ?></td>
</tr>
<?php
}

// Liberar conjunto de resultados y cerrar conexión
mysqli_free_result($vResultado);
mysqli_close($link);
?>
</table>

<?php
// Mostrar enlaces de paginación
if ($total_paginas > 1) {
    for ($i = 1; $i <= $total_paginas; $i++) {
        if ($pagina == $i)
            echo $pagina . " ";
        else
            echo "<a href='Listado_pag.php?pagina=" . $i . "'>" . $i . "</a> ";
    }
}
?>

<p align="center"><a href="Menu.html">Volver al menú del ABM</a></p>
</body>
</html>
