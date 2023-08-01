<?php

use App\Modelos\Conexion;
use App\Modelos\productos;

require_once __DIR__ . '/../src/modelos/productos.php';
require_once __DIR__ . '/../src/modelos/Conexion.php';
session_start();
require __DIR__ . '/../vendor/autoload.php';


$productos = new productos();
$db = new Conexion();
$con = $db->conectar();
$sku = isset($_GET['id']) ? $_GET['id'] : '';

if ($sku == '') {
  echo 'ERROR AL PROCESAR LA PETICION';
  exit;
} else {

  $sql = $con->prepare("SELECT COUNT(sku) FROM Productos WHERE sku=?");
  $sql->execute([$sku]);
  if ($sql->fetchColumn() > 0) {
    $descrip = $productos->descproducto($sku);
    $producto = $descrip['nombre'];
    $descripcion = $descrip['descripcion'];
    $precio = $descrip['precio'];
    $marca = $descrip['Marca'];
    $imagen = $descrip['IMAGEN'];
    $tipo_lente = $descrip['tipo_lente'];
    $stock = $descrip['stock'];
    $recomendados = $productos->recomendados($sku);
  } else {
    echo 'ERROR AL PROCESAR LA PETICION';
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!--Css-->
  <link rel="stylesheet" href="../css/index.css">
  <!--Icon-->
  <link rel="icon" href="images/icon.png">
  <title>Pop Ópticos</title>
</head>

<body>


  <!--Header-->
  <?php
  include 'header.php';
  ?>

  <!--contenido-->
 <!--contenido-->
<main class="mt-4 mb-4">
  <div class="container">
    <div class="row">
      <div class="col-md-6 order-md-1 text-center">
        <?php // Verificar si hay un mensaje de alerta en $_SESSION
            if (isset($_SESSION['mensaje'])) {
              echo '<div class="alert alert-warning">' . $_SESSION['mensaje'] . '</div>';
              unset($_SESSION['mensaje']); // Eliminar el mensaje para que no se muestre nuevamente
            } ?>
        <!--aqui es donde se utilizaria php, titulo, marca, precio e imagenes-->
        <h1><?php echo $producto; ?></h1>
        <h3><?php echo $marca; ?></h3>
        <h2>$ <?php echo $precio; ?></h2>
        <p><strong> Productos disponibles:</strong> <?php echo $stock; ?></p> <!-- Mostrar el stock del producto -->
        <div class="mb-3 border-top border-5"></div>
        <p class="lead">
          <?php echo $descripcion; ?>
          <br>
          <?php echo $tipo_lente; ?>
        </p>
        <div class="mb-3 border-top border-5"></div>

        <form action="agregar_al_carrito.php" method="post">
          <input type="hidden" name="producto_id" value="<?php echo $sku; ?>">
          <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" min="1" max="<?php echo $stock; ?>" value="1" class="form-control">
          </div>
          <button type="submit" name="agregar_al_carrito" class="btn btn-light btn-outline-dark">Añadir al carrito</button>
        </form>

      </div>
      <div class="col-md-6 order-md-2">
        <!--aqui es donde se utilizaria php, se utilizara foreach para imagenes-->

        <div id="carouselImages" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">

              <img src="<?php echo '/../productosimg/' . $imagen; ?>" class="d-block w-100" alt="...">

            </div>

          </div>

        </div>

      </div>
    </div>

  </div>
</main>


  <!--Contenido Recomendados-->
  <div class="container-fluid titulos-azul mt-4 mb-4">
    <!--Titulo azul-->
    <div class="row justify-text">
      <h4 class="text-center azul text-black">Recomendados</h4>
    </div>
    <!--fila-->
    <div class="row text-start">
      <?php
      foreach ($recomendados as $reco) {
      ?>
        <!--lentes5-->
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
          <div class="card" style="width: 19rem;">
            <a href="prodejem.php?id=<?php echo $reco['sku']; ?>"><img src="<?php echo '/../productosimg/' . $reco['IMAGEN']; ?>" class="card-img-top" alt="..." width="200px" height="230px"></a>
            <div class="card-body">
              <h5 class="card-title h4"><?php echo $reco['nombre']; ?></h5>
              <a class="objeto-texto" href="prodejem.php?id=<?php echo $reco['sku']; ?>">
                <p class="card-text h5">$<?php echo $reco['precio']; ?> MXN</p>
              </a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>


    </div>
  </div>

  <!--footer-->
  <?php
  include 'footer.php';
  ?>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>