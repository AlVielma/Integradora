
<!DOCTYPE html>
<html>
<head>
  <title>Agregar Producto.</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="/admin/css/produc.css">
</head>
<body>
  <!-- Sidebar -->
  <?php include 'sidebar.php'; ?>
  <br>

  <div class="container-fluid" id="content">
    <!-- Add any validation messages here if needed -->

    <div class="">
      <h1>Listado de Clientes</h1>
    </div>

    <!-- Add any buttons or actions specific to the Clients view here -->

    <h2>Clientes</h2>

    <!-- Table of clients -->
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Teléfono</th>
            <!-- Add more client-related columns if needed -->
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Loop through the array of clients and populate the table rows
          foreach($clientes as $cliente)
          {
            ?>
            <tr>
              <td><?php echo $cliente['nombre']; ?></td>
              <td><?php echo $cliente['apellido']; ?></td>
              <td><?php echo $cliente['email']; ?></td>
              <td><?php echo $cliente['telefono']; ?></td>
              <!-- Add more columns if needed -->
              <td>
                <!-- Add client-specific actions here -->
                <a href="#" class="btn btn-warning">
                  <img src="edit-icon.png" alt="Editar">
                </a>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-id="<?php echo $cliente['id']; ?>" data-bs-target="#modalEliminarCliente">
                  <img src="delete-icon.png" alt="Eliminar">
                </a>
              </td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>