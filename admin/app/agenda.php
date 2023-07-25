<?php
session_start();
use App\Modelos\metodoscita;
require __DIR__.'/../../src/modelos/metodoscita.php';
$cita= new metodoscita();
$cita_m = $cita->mostrar();
/*
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id']) || $_SESSION['user_rol'] != 1) {
  // Si el usuario no ha iniciado sesión o no tiene rol de admin, redirigir al index (página de usuario)
  header("Location: ../../pages/login.php");
  exit;
}*/

?>
<!DOCTYPE html>
<html>

<head>
  <title>Agenda del Administrador</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="/admin/css/agenda.css">
</head>

<body>
<!--Sidebar-->
<?php include 'sidebar.php';
?>

  
  <div class="container-fluid" id="content">
      <h1>CITAS</h1>
     <!-- Tabla de Citas -->
     <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Telefono</th>
              <th>Correo</th>
              <th>Fecha</th>
              <th>Hora</th>
              <th>Cancelar</th>
            </tr>
          </thead>
          <tbody>
            <td>F</td>
            <td>A</td>
            <td>F</td>
            <td>F</td>
            <td>F</td>
            <td>F</td>
            <td>F</td>
          </tbody>
        </table>
      </div>
  </div>

  <button class="collapse-button hidden" id="collapseButton"><i class="fas fa-bars"></i></button>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/admin/js/boton.js"></script>
</body>

</html>