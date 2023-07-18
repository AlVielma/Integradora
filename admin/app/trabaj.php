<!DOCTYPE html>
<html>

<head>
  <title>Administrador de Trabajadores</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="/admin/css/trab.css">
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
    <br><br><br><br><br><br><br><br>
    <a class="nav-link" href="../index.php"><i class="fas fa-sign-out-alt"></i><span>Cerrar Sesión</span></a>
  </div>

  <div class="container-fluid py-5" id="content">
    <h1 class="mb-4">Agregar Trabajador</h1>
    <form id="agregarForm" class="row g-3 needs-validation">
      <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control form-control-sm" id="nombre" placeholder="Ingresa el nombre" required>
        <div class="invalid-feedback">
          Por favor, ingresa un nombre válido.
        </div>
      </div>
      <div class="col-md-6">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control form-control-sm" id="apellido" placeholder="Ingresa el apellido" required>
        <div class="invalid-feedback">
          Por favor, ingresa un apellido válido.
        </div>
      </div>
      <div class="col-md-6">
        <label for="gmail" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control form-control-sm" id="gmail" placeholder="Ingresa el correo electrónico" required>
        <div class="invalid-feedback">
          Por favor, ingresa un correo electrónico válido.
        </div>
      </div>
      <div class="col-md-6">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="tel" class="form-control form-control-sm" id="telefono" placeholder="Ingresa el número de teléfono" required>
        <div class="invalid-feedback">
          Por favor, ingresa un número de teléfono válido.
        </div>
      </div>
      <div class="col-md-6">
        <label for="contrasena" class="form-label">Contraseña</label>
        <input type="password" class="form-control form-control-sm" id="contrasena" placeholder="Ingresa una contraseña" required>
        <div class="invalid-feedback">
          Por favor, ingresa una contraseña válida.
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Agregar</button>
      </div>
    </form>
    <ul id="trabajadoresLista" class="list-group mt-4"></ul>
  </div>

  <button class="collapse-button hidden" id="collapseButton"><i class="fas fa-bars"></i></button>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/admin/js/agregartra.js"></script>
  <script src="/admin/js/boton.js"></script>
</body>

</html>