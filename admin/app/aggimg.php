<?php
require __DIR__.'/../../vendor/autoload.php';
use App\Modelos\productos;
$productos = new productos();
$mostrar=$productos->mostrar_productos()
?>
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
<br>

  <div class="container-fluid" id="content">
    <div class="">
      <h1>Agregar Producto</h1>
    </div>

    <!-- Button trigger modal -->
    <a href="../../http/modalproducto.php" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalproducto">
        Agregar
    </a>

    <h2>Productos</h2>

    <!-- Tabla de productos -->
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Categoría</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="productosTabla">
            <?php
            foreach($productos as $product)
            {
            ?>
              <tr>
                <td><?php echo $product['nombre']; ?></td>
                <td><?php echo $product['descripcion']; ?></td>
                <td><?php echo $product['categoria']; ?></td>
                <td><?php echo $product['precio']; ?></td>
                <td><?php echo $product['stock']; ?></td>
                <td>
                  <a class="btn btn-warning" href=""><img src="../../images/editar.png" alt=""></a>
                  <a class="btn btn-danger"href=""><img src="../../images/circulo-x.png" alt=""></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
  </div>
  <?php
  require __DIR__.'/../../src/http/modalproducto.php';
  ?>
  <button class="collapse-button hidden" id="collapseButton"><i class="fas fa-bars"></i></button>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/admin/js/agregarpro.js"></script>
  <script src="/admin/js/boton.js"></script>
</body>

</html>
