<?php
session_start();

if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito']) || count($_SESSION['carrito']) === 0) {
  // Carrito vacío
  header("Location: incarejem.php");
  exit; 
  $carritoVacio = true;

} else {
  // Carrito con productos
  $carritoVacio = false;
}

require __DIR__ . '/../vendor/autoload.php';

use App\Modelos\productos;

$productosModelo = new productos();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!--Css-->
  <link rel="stylesheet" href="../css/index.css">
  <!--Icon-->
  <link rel="icon" href="../images/icon.png">
  <title>Pop Ópticos</title>
</head>

<body>

  <!--Header-->
  <?php include 'header.php';
  ?>

  <!--Contenido-->
  
  <div class="container border border-black mt-4 mb-4">
    <?php
    $total = 0;
    foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
      // Obtener los detalles del producto desde la base de datos
      $producto = $productosModelo->consultaeedit($producto_id);
      if (!empty($producto)) {
        // Se asume que cada producto tiene solo una fila en la consulta
        $nombre = $producto[0]['nombre'];
        $precio = $producto[0]['precio'];
        $imagen = $producto[0]['IMAGEN'];
        $descripcion = $producto[0]['descripcion'];

        $total += $precio * $cantidad;
    ?>
        <h2 class="text-center"><?php echo $nombre; ?></h2>
        <div class="row">
          <div class="col-md-4">
            <img src="<?php echo '../productosimg/' . $imagen; ?>" alt="Imagen del producto" class="img-fluid">
          </div>
          <div class="col-md-8">
          <p class="lead font-weight-bold"><?php echo $descripcion; ?></p>
            <p class="lead font-weight-bold">$<?php echo number_format($precio, 2); ?> MXN</p>
            <p class="lead font-weight-bold">Pop Ópticos</p>
            <!-- Resto del contenido del producto -->
            <div class="row">
              <div class="col-md-6">
                <input type="number" class="form-control btn-sm border-dark" value="<?php echo $cantidad; ?>" placeholder="Cantidad:" style="width: 150px;">
              </div>
              <div class="col-md-6">
                <form action="eliminar_producto.php" method="post">
                  <input type="hidden" name="sku" value="<?php echo $producto_id; ?>">
                  <button type="submit" class="btn btn-light btn-outline-dark">Eliminar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="mb-3 border-top border-5"></div>
    <?php
      }
    }
    ?>

  <!--Contenido Recomendados-->
  <div class="container-fluid titulos-azul mt-4 mb-4">
    <!--Titulo azul-->
    <div class="row justify-text">
      <h4 class="text-center azul text-black">Otros productos</h4>
    </div>
    <!--fila-->
    <div class="row text-start">
      <!--lentes5-->
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
        <div class="card" style="width: 19rem;">
          <a href="#"><img src="../images/lentes5.png" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title h4">Ky 0004</h5>
            <a class="objeto-texto" href="#">
              <p class="card-text h5">$1899,00 MXN</p>
            </a>
          </div>
        </div>
      </div>
      <!--lentes6-->
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
        <div class="card" style="width: 19rem;">
          <a href="#"><img src="../images/lentes6.png" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title h4">Silver Seven</h5>
            <a class="objeto-texto" href="#">
              <p class="card-text h5">$2299,00 MXN</p>
            </a>
          </div>
        </div>
      </div>
      <!--lentes7-->
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
        <div class="card" style="width: 19rem;">
          <a href="#"><img src="../images/lentes7.png" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title h4">Kipling 4065</h5>
            <a class="objeto-texto" href="#">
              <p class="card-text h5">$1999,00 MXN</p>
            </a>
          </div>
        </div>
      </div>
      <!--lentes8-->
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
        <div class="card" style="width: 19rem;">
          <a href="#"><img src="../images/lentes8.png" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title h4">Cloe25288</h5>
            <a class="objeto-texto" href="#">
              <p class="card-text h5">$2599,00 MXN</p>
            </a>
          </div>
        </div>
      </div>
      <!--lentes3-->
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
        <div class="card" style="width: 19rem;">
          <a href="#"><img src="../images/lentes3.png" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title h4">Ky Eyewear 0091</h5>
            <a class="objeto-texto" href="#">
              <p class="card-text h5">$1699,00 MXN</p>
            </a>
          </div>
        </div>
      </div>
      <!--lentes4-->
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
        <div class="card" style="width: 19rem;">
          <a href="#"><img src="../images/lentes4.png" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title h4">Axess clip solar 2717</h5>
            <a class="objeto-texto" href="#">
              <p class="card-text h5">$2799,00 MXN</p>
            </a>
          </div>
        </div>
      </div>
      <!--lentes1-->
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
        <div class="card" style="width: 19rem;">
          <a href="#"><img src="../images/lentes1.png" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title h4">Kipling 1116</h5>
            <a class="objeto-texto" href="#">
              <p class="card-text h5">$1990,00 MXN</p>
            </a>
          </div>
        </div>
      </div>
      <!--lentes2-->
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
        <div class="card" style="width: 19rem;">
          <a href="#"><img src="../images/lentes2.png" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title h4">Ky Eyewear 3556</h5>
            <a class="objeto-texto" href="#">
              <p class="card-text h5">$1699,00 MXN</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--footer-->
  <div class="container-fluid border border-black footer bg-dark text-white">

    <!--Footer superio-->
    <div class="row p-5 text-aling-center">

      <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
        <h3>Pop Ópticos</h3>
        <a href="index.html"><img src="../images/icon64.png" alt=""></a>

      </div>
      <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
        <p class="h5">Dirección</p>
        <div class="mb-2">
          <p>Av.Juárez 4880 y Xochimilco Oriente, Torreón, Méxcio</p>
        </div>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
        <p class="h5">Contacto</p>
        <div class="mb-2">
          <p>871 735 8778</p>
        </div>
        <div class="mb-2">
          <a class="text-decoration-none text-white" href="#">ventas@opticapop.com</a>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
        <p class="h5">Redes</p>
        <div class="mb-2">
          <a href=""><img src="../images/facebook.png" alt=""></a>
        </div>
        <div class="mb-0">
          <p>Facebook</p>
        </div>
        <div class="mb-2">
          <a href=""><img src="../images/whatsapp.png" alt=""></a>
        </div>
        <div class="mb-0">
          <p>Whatsapp</p>
        </div>
      </div>
      <!--Derechos de autor-->
      <div class="col-xs-12 pt-5">
        <p class="text-white text-center"> Copyright - All rights reserved © 2023</p>
      </div>

    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>