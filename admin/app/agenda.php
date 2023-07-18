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
<div class="sidebar" id="sidebar">
  <div class="logo">
    <img src="../img/logo.jpg" alt="Logo">
  </div>
  <a class="nav-link" href="aggimg.php"><i class="fas fa-box"></i><span>Gestionar Producto</span></a>
  <a class="nav-link" href="trabaj.php"><i class="fas fa-users"></i><span>Gestionar Trabajadores</span></a>
  <a class="nav-link" href="agenda.php"><i class="fas fa-calendar-alt"></i><span>Gestionar Agenda</span></a>
  <a class="nav-link" href="consulta.php"><i class="fas fa-stethoscope"></i><span>Realizar Consulta</span></a>
  <a class="nav-link" href="receta.php"><i class="fas fa-prescription"></i><span>Generar Receta</span></a>
  <a class="nav-link" href="../index.php"><i class="fas fa-sign-out-alt"></i><span>Cerrar Sesión</span></a>
</div>

  
  <div class="container-fluid" id="content">
    <div class="agenda-item mt-2">
      <div class="title">Cita 1</div>
      <div class="details">
        <span>Fecha: 2023-06-15</span> |
        <span>Hora: 09:00 AM</span> |
        <span>Agendado por: David</span>
      </div>
      <div class="description">Motivo de la cita 1</div>
      <button class="button cancel" onclick="cancelarCita(this)">Cancelar</button>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#1">
        Ver datos
      </button>

      <!-- Modal -->
      <div class="modal fade" id="1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Datos</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>1</p>
              <p>John</p>
              <p>Doe</p>
              <p>123456789</p>
              <p>john@example.com</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="agenda-item">
      <div class="title">Cita 2</div>
      <div class="details">
        <span>Fecha: 2023-06-16</span> |
        <span>Hora: 02:30 PM</span> |
        <span>Agendado por: Marquitos</span>
      </div>
      <div class="description">Motivo de la cita 2</div>
      <button class="button cancel" onclick="cancelarCita(this)">Cancelar</button>
    </div>

    <div class="agenda-item">
      <div class="title">Cita 3</div>
      <div class="details">
        <span>Fecha: 2023-06-17</span> |
        <span>Hora: 11:15 AM</span> |
        <span>Agendado por: JGL</span>
      </div>
      <div class="description">Motivo de la cita 3</div>
      <button class="button cancel" onclick="cancelarCita(this)">Cancelar</button>
    </div>
  </div>

  <button class="collapse-button hidden" id="collapseButton"><i class="fas fa-bars"></i></button>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/admin/js/cancelarcita.js"></script>
  <script src="/admin/js/boton.js"></script>
</body>

</html>