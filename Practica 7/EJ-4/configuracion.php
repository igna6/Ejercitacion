<?php
if ($_POST) {
  $tipo_seleccionado = $_POST['tipo_titular'] ?? '';

  if (in_array($tipo_seleccionado, ['politica', 'economia', 'deportes'])) {
    setcookie('tipo_titular', $tipo_seleccionado, time() + (30 * 24 * 60 * 60), '/');
    $mensaje = "Preferencia guardada exitosamente";
    $redirect = true;
  } else {
    $mensaje = "Error: Selecciona una opción válida";
    $redirect = false;
  }
}


$preferencia_actual = $_COOKIE['tipo_titular'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configuración - El Diario Digital</title>

</head>

<body>
  <header>
    <h1>Configuración de Preferencias</h1>
  </header>

  <div>
    <nav>
      <a href="index.php">Volver al Inicio</a>
      <a href="configuracion.php">Configurar Preferencias</a>
      <a href="limpiar_cookies.php">Limpiar Cookies</a>
    </nav>

    <?php if (isset($mensaje)): ?>
      <div <?php echo $redirect ? 'exito' : 'error'; ?>">
        <?php echo $mensaje; ?>
      </div>
      <?php if ($redirect): ?>
        <script>
          setTimeout(function() {
            window.location.href = 'index.php';
          }, 2000);
        </script>
      <?php endif; ?>
    <?php endif; ?>

    <?php if ($preferencia_actual): ?>
      <div>
        <strong>Preferencia actual:</strong>
        <?php
        switch ($preferencia_actual) {
          case 'politica':
            echo 'Noticias Políticas';
            break;
          case 'economia':
            echo 'Noticias Económicas';
            break;
          case 'deportes':
            echo 'Noticias Deportivas';
            break;
        }
        ?>
      </div>
    <?php endif; ?>

    <div>
      <h2>Selecciona tu tipo de titular preferido</h2>

      <form method="POST" action="">
        <div>
          <label <?php echo ($preferencia_actual === 'politica') ? 'selected' : ''; ?>">
            <input type="radio" name="tipo_titular" value="politica"
              <?php echo ($preferencia_actual === 'politica') ? 'checked' : ''; ?>>
            <div>
              <div>Noticias Políticas</div>
              <div>
                Info de noticias políticas
              </div>
            </div>
          </label>

          <label <?php echo ($preferencia_actual === 'economia') ? 'selected' : ''; ?>">
            <input type="radio" name="tipo_titular" value="economia"
              <?php echo ($preferencia_actual === 'economia') ? 'checked' : ''; ?>>
            <div>
              <div>Noticias Económicas</div>
              <div>
                Info de noticias económicas
              </div>
            </div>
          </label>

          <label <?php echo ($preferencia_actual === 'deportes') ? 'selected' : ''; ?>">
            <input type="radio" name="tipo_titular" value="deportes"
              <?php echo ($preferencia_actual === 'deportes') ? 'checked' : ''; ?>>
            <div>
              <div>Noticias Deportivas</div>
              <div>
                Info de noticias deportivas
              </div>
            </div>
          </label>
        </div>

        <button type="submit">
          Guardar Preferencia
        </button>
      </form>
    </div>
  </div>

  <script>
    document.querySelectorAll('.radio-option').forEach(option => {
      option.addEventListener('click', function() {

        document.querySelectorAll('.radio-option').forEach(opt => {
          opt.classList.remove('selected');
        });


        this.classList.add('selected');


        this.querySelector('input[type="radio"]').checked = true;
      });
    });
  </script>
</body>

</html>