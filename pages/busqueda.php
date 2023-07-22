<?php
require __DIR__ . '/../vendor/autoload.php';
use App\Modelos\Conexion;

$conexion = new Conexion();
$con = $conexion->conectar();

// Agregar la ruta base de las imágenes
$rutaBaseImagenes = '/productosimg/';

$product = [];

if (isset($_POST['busqueda'])) {
    $busqueda = addslashes($_POST['busqueda']);
    $consulta = $con->query("CALL BuscadorPro('$busqueda');");
    $product = $consulta->fetchAll(PDO::FETCH_OBJ);
    // Cierra el cursor de la consulta anterior para liberar recursos
    $consulta->closeCursor();
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
    <link rel="stylesheet" href="/../css/index.css">
    <!--Icon-->
    <link rel="icon" href="/../images/icon.png">
    <title>Pop Ópticos</title>
</head>
<body>
    <!--Header-->
    <header class="header">
        <!--Barra navegacion-->
        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container-fluid">

                <a class="navbar-brand text-white" href="../index.php">
                    <img src="/../images/icon.png" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top">
                    Pop Ópticos
                </a>

                <div class="container-fluid">
                    <form class="d-flex" role="search" method="POST">
                        <input class="form-control me-2 busqueda" type="search" placeholder="Search"
                            aria-label="Search" name="busqueda">
                    </form>
                </div>

                <a class="navbar-brand text-white" href="car.html">
                    <img src="/../images/carrito.png" alt="Logo" class="d-inline-block align-text-top carrito-icono">
                  </a>
                  <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><img src="/../images/usuario.png" width="35" height="35" alt="Usuario"></a>

                </div> 
              </nav>
              <!--Sidebar superior-->
              <div class="offcanvas offcanvas-top bg-body-tertiary justify-content-center align-items-center text-center" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel" >
                <div class="offcanvas-header">
                  <div class="row"><h3 class="offcanvas-title" id="offcanvasTopLabel text-center">¡Hola Pop!</h3></div>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
                  <div class="row">
                    <div class="col-12">
                      <i class="h5">¡Bienvenido! Inicia sesion o registrate</i>
                      <img src="/../images/icon.png" alt="" width="70" height="70">
                    </div>
                  </div>

                  <div class="row mx-5 text-center justify-content-center">
                    <a href="/../pages/login.html" class="objeto-texto h3">Inicia Sesion</a>
                    <a href="/../pages/register.html" class="objeto-texto h3">Registrate</a>
                  </div>
                </div>
              </div>
              <!--/Sidebar superior-->
        </nav>
        <!--Barra catalogos-->
        <nav class="navbar navbar-expand-lg bg-dark justify-content-center">
            <div class="container-fluid">
                <button class="navbar-toggler border border-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar"><img src="/../images/menu-hamburguesa.png" alt="Hamburgues" width="20"
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
                                <li><a class="dropdown-item" href="popunisex.php">Pop Unisex</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="pophombres.php">Pop Hombre</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="popmujer.php">Pop Mujer</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Niños
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="popniños.php">Niños Pop</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="popniñas.php">Niñas Pop</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Solar
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="solarmujer.php">Solar Hombre</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="solarhombre.php">Solar Mujer</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-white" href="exam.php">Agenda Examen</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
          
          
             <!--Contenido Recomendados-->
             <div class="mt-3 container-fluid titulos-azul">
               <!-- Titulo -->
                <div class="row border border-3 border-secondary align-items-center p-2 mb-4">
                    <div class="col-md-8">
                    <h1 class="text-start text-black ms-5">BUSQUEDA</h1>
                    </div>
                    <!-- Filtrador -->
                    <div class="col-md-2 text-md-end ">
                    <form action="" method="POST">
                        <select name="orden" id="filter-category" class="form-select border border-black">
                            <option value="">Filtrar por:</option>
                            <option value="mayor_menor">Precio: Mayor a Menor</option>
                            <option value="menor_mayor">Precio: Menor a Mayor</option>
                        </select>
                    </form>
                    </div>
                    <div class="col-md-2 ">
                        <h5 class=" text-black">Cantidad: <?php echo count($product); ?></h5>
                    </div>
                </div>
              <div class="row text-start">
                <?php
                  if (count($product) > 0) {
                      foreach ($product as $producto) {
                          echo '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">';
                          echo '<div class="card" style="width: 19rem;">';
                          echo '<a href="#"><img src="'. $rutaBaseImagenes . $producto->imagen .'" class="card-img-top" alt="Imagen del producto"></a>';
                          echo '<div class="card-body">';
                          echo '<h5 class="card-title h4">' . $producto->nombre . '</h5>';
                          echo '<a class="objeto-texto" href="#"><p class="card-text h5">' . $producto->precio . '</p></a>';
                          echo '</div>';
                          echo '</div>';
                          echo '</div>';
                      }
                  } else {
                      echo '<div class="col-sm-12">';
                      echo '<p class="h5">No se encontraron resultados.</p>';
                      echo '</div>';
                  }
                  ?>
               </div>
             </div>
            <!--footer-->
            <div class="container-fluid border border-black footer bg-dark text-white">

              <!--Footer superio-->
              <div class="row p-5 text-aling-center">

                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <h3>Pop Ópticos</h3>
                    <a href="index.php"><img src="/../images/icon64.png" alt=""></a>
                  
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
                    <p class="text-decoration-none text-white">ventas@opticapop.com</p>
                  </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                  <p class="h5">Redes</p>
                  <div class="mb-2">
                    <a href="https://www.facebook.com/opticaPOP/"><img src="/../images/facebook.png" alt=""></a>
                  </div>
                  <div class="mb-0">
                    <p>Facebook</p>
                  </div>
                  <div class="mb-2">
                    <a href="https://wa.link/35sn9o"><img src="/../images/whatsapp.png" alt=""></a>
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


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>