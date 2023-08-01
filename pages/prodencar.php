<<<<<<< HEAD
=======
<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/modelos/Carrito.php';
require_once __DIR__ . '/../src/modelos/productos.php';

use App\Modelos\Carrito;
use App\Modelos\productos;

// Crear un objeto de la clase Carrito
$carritoModelo = new Carrito();
$productosModelo = new productos();

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['user_id'])) {
  // Obtener el ID del usuario actual desde la sesión
  $usuario_id = $_SESSION['user_id'];

  // Obtener los productos del carrito para el usuario actual desde la base de datos
  $productosCarrito = $carritoModelo->obtenerProductosCarritoEstado1($usuario_id);
} else {
  // El usuario no ha iniciado sesión o no tiene productos en el carrito
  $productosCarrito = [];
}
?>

>>>>>>> e513c5118efd58b1f8fe455b8472a39146efdf58
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!--Css-->
  <link rel="stylesheet" href="../css/index.css">
  <!--Icon-->
  <link rel="icon" href="../images/icon.png">
  <title>Pop Ópticos</title>
</head>

<body>

<<<<<<< HEAD
    <!--Header-->
    <header class="header">
        <!--Barra navegacion-->
        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container-fluid">

                <a class="navbar-brand text-white" href="login.html">
                    <img src="../images/icon.png" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top">
                    Pop Ópticos
                </a>

                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 busqueda" type="search" placeholder="Search"
                            aria-label="Search">
                    </form>
                </div>

                <a class="navbar-brand text-white" href="pages/car.html">
                    <img src="../images/carrito.png" alt="Logo" class="d-inline-block align-text-top carrito-icono">
                  </a>
                <a class="navbar-brand text-white" href="#">
                    <img src="../images/usuario.png" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>
        <!--Barra catalogos-->
        <nav class="navbar navbar-expand-lg bg-dark justify-content-center">
            <div class="container-fluid">
                <button class="navbar-toggler border border-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar"><img src="../images/menu-hamburguesa.png" alt="Hamburgues" width="20"
                            height="20"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Adultos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="popunisex.html">Pop Unisex</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="pophombres.html">Pop Hombre</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="popmujer.html">Pop Mujer</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Niños
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="popniños.html">Niños Pop</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="popniñas.html">Niñas Pop</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Solar
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="solarhombre.html">Solar Hombre</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="solarmujer.html">Solar Mujer</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="exam.html">Agenda Examen</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--Contenido-->
    <div class="container border border-black mt-4 mb-4">
        <div class=" mt-4 mb-4"">
            <!--Recuerda que aqui el los campos se modifican con php, esto es solo una prueba como se veria-->
          <h2 class="text-center">Ky 0004</h2>
          <div class="row">
            <div class="col-md-4 ">
              <img src="../images/lentes5.png"" alt="Imagen del producto" class="img-fluid ">
            </div>
            <div class="col-md-8">
              <p  class="lead font-weight-bold">$1899,00 MXN</p>
              <p  class="lead font-weight-bold">Pop Ópticos</p>
              <p>Lentes Monofocales con armazon de color negro</p>

              <div class="row">
                <div class="col-md-6">
                    <input type="number" class="form-control btn-sm border-dark" placeholder="Cantidad:" style="width: 150px;">
                </div>
                <div class="col-md-6">
                  <button class="btn btn-light btn-outline-dark">Eliminar</button>
=======
  <!--Header-->
  <?php include 'header.php';
  ?>

  <!--Contenido-->

  <div class="container border border-black mt-4 mb-4">
    <?php
    if (empty($productosCarrito)) {
      // Mostrar mensaje de carrito vacío
      echo '<h2 class="text-center">El carrito está vacío.</h2>';
    } else {
      $total = 0;
      foreach ($productosCarrito as $producto) {
        // Obtener los detalles del producto desde la base de datos
        $productoDetalles = $productosModelo->consultaeedit($producto['sku']);
        if (!empty($productoDetalles)) {
          // Se asume que cada producto tiene solo una fila en la consulta
          $nombre = $productoDetalles[0]['nombre'];
          $precio = $productoDetalles[0]['precio'];
          $imagen = $productoDetalles[0]['IMAGEN'];
          $descripcion = $productoDetalles[0]['descripcion'];
    ?>
          <h2 class="text-center"><?php echo $nombre; ?></h2>
          <div class="row">
            <div class="col-md-4">
              <img src="<?php echo '../productosimg/' . $imagen; ?>" alt="Imagen del producto" class="img-fluid">
            </div>
            <div class="col-md-8">
              <p class="lead font-weight-bold"><?php echo $descripcion; ?></p>
              <p class="lead font-weight-bold">Precio Unitario: $<?php echo number_format($precio, 2); ?> MXN</p>
              <p class="lead font-weight-bold">Pop Ópticos</p>
              <!-- Resto del contenido del producto -->
              <div class="row">
                <div class="col-md-6">
                  <label for="cantidad" class="form-label">Cantidad:</label>
                  <!-- Mostrar la cantidad en un label o texto -->
                  <span><?php echo $producto['cantidad']; ?></span>
                  <p class="lead font-weight-bold">Total: $<?php echo number_format($producto['total'], 2); ?> MXN</p>
                </div>
                <div class="col-md-6">
                  <form action="eliminar_producto.php" method="post">
                    <input type="hidden" name="sku" value="<?php echo $producto['sku']; ?>">
                    <button type="submit" class="btn btn-light btn-outline-dark">Eliminar</button>
                  </form>
>>>>>>> e513c5118efd58b1f8fe455b8472a39146efdf58
                </div>
              </div>
            </div>
          </div>
<<<<<<< HEAD
        </div>
        
        <div class="mb-3 border-top border-5"></div>

        <div class=" mt-4 mb-4"">
            <h2 class="text-center">Kipling 1116</h2>
            <div class="row">
              <div class="col-md-4 ">
                <img src="../images/lentes1.png" alt="Imagen del producto" class="d-block w-100 ">
              </div>
              <div class="col-md-8">
                <p  class="lead font-weight-bold">$1990.00</p>
                <p  class="lead font-weight-bold">Kipling</p>
                <p>Color amarillo
                    Tipo de lente Monofocales</p>
  
                <div class="row">
                  <div class="col-md-6">
                      <input type="number" class="form-control btn-sm border-dark" placeholder="Cantidad:" style="width: 150px;">
                  </div>
                  <div class="col-md-6">
                    <button class="btn btn-light btn-outline-dark">Eliminar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="mb-3 border-top border-5"></div>
        
        <!-- Agrega más elementos de productos aquí -->
        
        <div class="mb-3 align-items-center d-flex justify-content-center">
          <a href="#" class="btn btn-light btn-outline-dark me-3">Seguir comprando</a>
          <a href="#" class="btn btn-light btn-outline-dark">Apartar</a>
        </div>
      </div>
      
    
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
                <a class="objeto-texto" href="#"><p class="card-text h5">$1899,00 MXN</p></a>
              </div>
            </div>
          </div>
          <!--lentes6-->
          <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
            <div class="card" style="width: 19rem;">
              <a href="#"><img src="../images/lentes6.png" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title h4">Silver Seven</h5>
                <a class="objeto-texto" href="#"><p class="card-text h5">$2299,00 MXN</p></a>
              </div>
            </div>
          </div>
          <!--lentes7-->
          <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
            <div class="card" style="width: 19rem;">
              <a href="#"><img src="../images/lentes7.png" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title h4">Kipling 4065</h5>
                <a class="objeto-texto" href="#"><p class="card-text h5">$1999,00 MXN</p></a>
              </div>
            </div>
          </div>
          <!--lentes8-->
          <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
            <div class="card" style="width: 19rem;">
              <a href="#"><img src="../images/lentes8.png" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title h4">Cloe25288</h5>
                <a class="objeto-texto" href="#"><p class="card-text h5">$2599,00 MXN</p></a>
              </div>
            </div>
          </div>
          <!--lentes3-->
          <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
            <div class="card" style="width: 19rem;">
              <a href="#"><img src="../images/lentes3.png" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title h4">Ky Eyewear 0091</h5>
                <a class="objeto-texto" href="#"><p class="card-text h5">$1699,00 MXN</p></a>
              </div>
            </div>
          </div>
           <!--lentes4-->
           <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
            <div class="card" style="width: 19rem;">
              <a href="#"><img src="../images/lentes4.png" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title h4">Axess clip solar 2717</h5>
                <a class="objeto-texto" href="#"><p class="card-text h5">$2799,00 MXN</p></a>
              </div>
            </div>
          </div>
           <!--lentes1-->
           <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
            <div class="card" style="width: 19rem;">
              <a href="#"><img src="../images/lentes1.png" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5 class="card-title h4">Kipling 1116</h5>
                <a class="objeto-texto" href="#"><p class="card-text h5">$1990,00 MXN</p></a>
              </div>
            </div>
          </div>
            <!--lentes2-->
=======
          <div class="mb-3 mt-3 border-top border-5"></div>
    <?php
        }
      }
    }
    ?>
    <div class="text-center">
    <a href="../index.php" class="btn btn-primary btn-lg">Seguir comprando</a>
    <a href="ver_total_carrito.php" class="btn btn-success btn-lg">Ver total y finalizar </a>
    </div>
  </div>


  <!--Contenido Recomendados-->
  <div class="container-fluid titulos-azul mt-4 mb-4">
    <!-- Titulo azul -->
    <div class="row justify-text">
        <h4 class="text-center azul text-black">Recomendados</h4>
    </div>
    <!-- fila -->
    <div class="row text-start">
        <?php
        $recomendados = $productosModelo->productosRecomendadosGenerales(8); // Obtiene 8 productos recomendados
        foreach ($recomendados as $reco) {
        ?>
            <!--lentes5-->
>>>>>>> e513c5118efd58b1f8fe455b8472a39146efdf58
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>