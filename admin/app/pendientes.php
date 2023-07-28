<?php
session_start();
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
      <h1>PRODUCTOS APARTADOS</h1>
     <!-- Tabla de Citas -->
     <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Correo</th>
              <th>Fecha</th>
              <th>Total pedido</th>
              <th>Confirmar/Cancelar</th>
            </tr>
          </thead>
        </table>
      </div>
  </div>
  <button class="collapse-button hidden" id="collapseButton"><i class="fas fa-bars"></i></button>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/admin/js/boton.js"></script>
  <script src="/admin/js/cancelarcita.js"></script>
</body>

</html>