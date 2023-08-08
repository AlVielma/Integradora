<?php
session_start();
require_once __DIR__ . '/../../src/modelos/Carrito.php';

use App\Modelos\Carrito;

// Crear un objeto de la clase Carrito
$carritoModelo = new Carrito();

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id']) || $_SESSION['user_rol'] != 1) {
  // Si el usuario no ha iniciado sesión o no tiene rol de admin, redirigir al index (página de usuario)
  header("Location: ../../pages/login.php");
  exit;
}

if (isset($_GET['search'])) {
  $searchTerm = $_GET['search'];
  $detallesCompras = $carritoModelo->buscarCompras($searchTerm);
} else {
  $detallesCompras = $carritoModelo->obtenerDetallesCompra();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Detalles de Compras</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="/admin/css/agenda.css">
</head>

<body>
  <!--Sidebar-->
  <?php include 'sidebar.php'; ?>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h1>LISTA DE APARTADOS</h1>
        <form action="pendientes.php" method="GET" autocomplete="off">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buscar apartados..." name="search" aria-label="Buscar pedidos" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="container-fluid" id="content">


    <!-- Tabla de Compras -->
    <div class="table-responsive">
      <!-- Tabla de Compras -->
      <table class="table">
        <thead>
          <tr>
            <th>Folio</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Total pedido</th>
            <th>Estado</th>
            <th>Productos</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($detallesCompras as $detalleCompra) : ?>
            <tr>
              <td><?php echo $detalleCompra['id_compra']; ?></td>
              <td><?php echo $detalleCompra['nombre_cliente'] . ' ' . $detalleCompra['apellido_cliente']; ?></td>
              <td><?php echo $detalleCompra['fecha_pedido']; ?></td>
              <td>$<?php echo number_format($detalleCompra['total'], 2); ?></td>
              <td>
                <?php if ($detalleCompra['estado_id'] == 1) : ?>
                  Inactivo
                <?php elseif ($detalleCompra['estado_id'] == 2) : ?>
                  Pendiente
                <?php else : ?>
                  Confirmada
                <?php endif; ?>
              </td>
              <!-- Columna para los detalles de los productos asociados a la compra -->
              <td>
                <ul>
                  <?php if (isset($_GET['search'])) : ?>
                    <!-- Mostrar productos según la búsqueda -->
                    <?php foreach ($detallesCompras as $detalleCompra) : ?>
                      <li><?php echo $detalleCompra['nombre_producto'] . ' - Cantidad: ' . $detalleCompra['cantidad'] . ' - Precio: $' . number_format($detalleCompra['precio'], 2); ?></li
                    <?php endforeach; ?>
                  <?php else : ?>
                    <!-- Mostrar productos normales -->
                    <?php foreach ($detalleCompra['productos'] as $producto) : ?>
                      <li><?php echo $producto['nombre_producto'] . ' - Cantidad: ' . $producto['cantidad']; ?></li>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </ul>
              </td>
              <td>
                <?php if ($detalleCompra['estado_id'] == 2) : ?>
                  <!-- Botón para confirmar la compra -->
                  <a href="confirmar_compra.php?id=<?php echo $detalleCompra['id_compra']; ?>&usuario_id=<?php echo $detalleCompra['usuario_id']; ?>" class="btn btn-success">Confirmar</a>
                  <!-- Botón para cancelar la compra -->
                  <a href="cancelar_compra.php?id=<?php echo $detalleCompra['id_compra']; ?>&usuario_id=<?php echo $detalleCompra['usuario_id']; ?>" class="btn btn-danger">Cancelar</a>
                <?php else : ?>
                  <!-- Mostrar mensaje indicando que la compra está confirmada o finalizada -->
                  <?php echo ($detalleCompra['estado_id'] == 4) ? 'Cancelada' : 'Confirmada'; ?>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
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