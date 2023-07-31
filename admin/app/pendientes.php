<?php
session_start();
require_once __DIR__ . '/../../src/modelos/Carrito.php';

use App\Modelos\Carrito;

// Crear un objeto de la clase Carrito
$carritoModelo = new Carrito();

// Obtener los detalles de todas las compras desde la base de datos
$detallesCompras = $carritoModelo->obtenerDetallesCompra();
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

  <div class="container-fluid" id="content">
    <h1>DETALLES DE COMPRAS</h1>
    <!-- Tabla de Compras -->
    <div class="table-responsive">
<!-- Tabla de Compras -->
<table class="table">
  <thead>
    <tr>
      <th>Cliente</th>
      <th>Fecha</th>
      <th>Total pedido</th>
      <th>Estado</th>
      <th>Productos</th> <!-- Nueva columna para los productos -->
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($detallesCompras as $detalleCompra) : ?>
      <tr>
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
            <?php foreach ($detalleCompra['productos'] as $producto) : ?>
              <li><?php echo $producto['nombre_producto'] . ' - Cantidad: ' . $producto['cantidad']; ?></li>
            <?php endforeach; ?>
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
            <?php echo ($detalleCompra['estado_id'] == 1) ? 'Inactivo' : 'Confirmada'; ?>
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