<?php

$preferencia = isset($_COOKIE['tipo_titular']) ? $_COOKIE['tipo_titular'] : 'todos';


$titulares = [
  'politica' => [
    'titulo' => 'Noticia de poítica',
    'contenido' => 'Texto de política.',
    'categoria' => 'POLÍTICA'
  ],
  'economia' => [
    'titulo' => 'Noticia de economía',
    'contenido' => 'Texto de economía.',
    'categoria' => 'ECONOMÍA'
  ],
  'deportes' => [
    'titulo' => 'Noticia de deportes',
    'contenido' => 'Texto de deportes.',
    'categoria' => 'DEPORTES'
  ]
];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Periódico</title>

</head>

<body>
  <header>
    <h1>Periódico</h1>
  </header>

  <div>
    <nav>
      <a href="index.php">Inicio</a>
      <a href="configuracion.php">Configurar Preferencias</a>
      <a href="limpiar_cookies.php">Limpiar Cookies</a>
    </nav>

    <?php if ($preferencia !== 'todos'): ?>
      <div>
        <strong>Titulares de:</strong>
        <?php
        switch ($preferencia) {
          case 'politica':
            echo 'Política';
            break;
          case 'economia':
            echo 'Economía';
            break;
          case 'deportes':
            echo 'Deportes';
            break;
        }
        ?>
        <br>

      </div>
    <?php endif; ?>

    <main>
      <?php
      if ($preferencia === 'todos') {
        // Primera visita: mostrar todos los titulares
        foreach ($titulares as $key => $titular) {
          echo "<article>";
          echo "<div $key'>{$titular['categoria']}</div>";
          echo "<div>";
          echo "<h2>{$titular['titulo']}</h2>";
          echo "<p>{$titular['contenido']}</p>";
          echo "</div>";
          echo "</article>";
        }
      } else {
        // Mostrar solo el titular seleccionado
        if (isset($titulares[$preferencia])) {
          $titular = $titulares[$preferencia];
          echo "<article>";
          echo "<div $preferencia'>{$titular['categoria']}</div>";
          echo "<div>";
          echo "<h2>{$titular['titulo']}</h2>";
          echo "<p>{$titular['contenido']}</p>";
          echo "</div>";
          echo "</article>";
        }
      }
      ?>
    </main>
  </div>
</body>

</html>