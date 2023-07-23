<div class="sidebar" id="sidebar">
  <div class="logo">
    <img src="../img/logo.jpg" alt="Logo">
  </div>
  <a class="nav-link" href="aggimg.php"><i class="fas fa-box"></i><span>Gestionar Producto</span></a>
  <a class="nav-link" href="trabaj.php"><i class="fas fa-users"></i><span>Gestionar Trabajadores</span></a>
  <a class="nav-link" href="agenda.php"><i class="fas fa-calendar-alt"></i><span>Gestionar Agenda</span></a>
  <a class="nav-link" href="consulta.php"><i class="fas fa-stethoscope"></i><span>Realizar Consulta</span></a>
  <a class="nav-link" href="receta.php"><i class="fas fa-prescription"></i><span>Generar Receta</span></a>
  <a class="nav-link" href="../../src/http/logout.php"><i class="fas fa-sign-out-alt"></i><span>Cerrar Sesión</span></a>
  
  <?php
    // Verificar si el usuario ha iniciado sesión y mostrar su nombre en el sidebar
    if (isset($_SESSION['user_name'])) {
        echo '<div style="text-align: center; margin-top: 20px;">';
        echo '<h2>¡Hola, ' . $_SESSION['user_name'] . '!</h2>';
        echo '</div>';
    }
    ?>
</div>