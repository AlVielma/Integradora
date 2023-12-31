<?php
session_start();
use App\Modelos\productos;
require 'vendor/autoload.php';
$productos = new productos();
$vendidos= $productos->masvendidos3();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!--Css-->
  <link rel="stylesheet" href="css/index.css">
  <!--Icon-->
  <link rel="icon" href="images/icon.png">
  <title>Pop Ópticos</title>
</head>
<!--Header-->

<body>
  <!--Header-->
  <header class="header">
    <!--Barra navegacion-->
    <nav class="navbar navbar-expand-lg bg-black">
      <div class="container-fluid">

        <a class="navbar-brand text-white" href="index.php">
          <img src="images/icon.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
          Pop Ópticos
        </a>

        <div class="container-fluid">
          <form class="d-flex" role="search" method="POST" action="/pages/busqueda.php">
            <input class="form-control me-2 busqueda" type="search" placeholder="Search" aria-label="Search" name="busqueda">
          </form>
        </div>

        <?php if (isset($_SESSION['user_name'])) : ?>
            <!-- Si la sesión está iniciada, muestre un carrito diferente -->
            <a class="navbar-brand text-white" href="pages/incarejem.php">
          <img src="../images/carrito.png" alt="Logo" class="d-inline-block align-text-top carrito-icono">
        </a>
          <?php else : ?>
            <!-- Si el usuario no ha iniciado sesión, si no, que lo mande a registrarse -->
            <a class="navbar-brand text-white" href="pages/car.php">
          <img src="../images/carrito.png" alt="Logo" class="d-inline-block align-text-top carrito-icono">
        </a>
          <?php endif; ?>
        <!-- Si la sesión está iniciada, muestra el nombre del usuario en lugar del icono -->
        <?php if (isset($_SESSION['user_name'])) : ?>
          <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" class="user-link text-white">
            <?php echo $_SESSION['user_name']; ?>
          </a>

        <?php else : ?>
          <!-- Si el usuario no ha iniciado sesión, muestra el icono predeterminado -->
          <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
            <img src="images/usuario.png" width="35" height="35" alt="Usuario">
          </a>
        <?php endif; ?>

      </div>
    </nav>

    <!--Sidebar superior-->
    <div class="offcanvas offcanvas-top bg-body-tertiary justify-content-center align-items-center text-center" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
      <div class="offcanvas-header">
        <div class="row">
          <!-- Si la sesión está iniciada, muestra el saludo personalizado con el nombre del usuario -->
          <?php if (isset($_SESSION['user_name'])) : ?>
            <h3 class="offcanvas-title" id="offcanvasTopLabel text-center">¡Hola Pop! <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h3>
          <?php else : ?>
            <!-- Si el usuario no ha iniciado sesión, muestra el saludo predeterminado -->
            <h3 class="offcanvas-title" id="offcanvasTopLabel text-center">¡Hola Pop!</h3>
          <?php endif; ?>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body">
        <div class="row">
          <div class="col-12">
            <?php if (isset($_SESSION['user_name'])) : ?>
              <!-- Si la sesión está iniciada, muestra el mensaje personalizado -->
              <i class="h5">¡Bienvenido! Ver perfil y cerrar sesión</i>
            <?php else : ?>
              <!-- Si el usuario no ha iniciado sesión, muestra el mensaje predeterminado -->
              <i class="h5">¡Bienvenido! Inicia sesión o regístrate</i>
            <?php endif; ?>
          </div>
        </div>

        <div class="row mx-5 text-center justify-content-center">
          <?php if (isset($_SESSION['user_name'])) : ?>
            <!-- Si la sesión está iniciada, muestra las opciones para el usuario logueado -->
            <a href="pages/perfil.php" class="objeto-texto h3">Ver perfil</a>
            <a href="src/http/logout.php" class="objeto-texto h3">Cerrar sesión</a>
          <?php else : ?>
            <!-- Si el usuario no ha iniciado sesión, muestra las opciones para iniciar sesión o registrarse -->
            <a href="pages/login.php" class="objeto-texto h3">Inicia Sesión</a>
            <a href="pages/register.php" class="objeto-texto h3">Regístrate</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!--/Sidebar superior-->

    <!--Barra catalogos-->
    <nav class="navbar navbar-expand-lg bg-dark justify-content-center">
      <div class="container-fluid">
        <button class="navbar-toggler border border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar"><img src="images/menu-hamburguesa.png" alt="Hamburgues" width="20" height="20"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Adultos
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="pages/popunisex.php">Pop Unisex</a></li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="pages/pophombres.php">Pop Hombre</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="pages/popmujer.php">Pop Mujer</a></li>
          </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Niños
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="pages/popniños.php">Niños Pop</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="pages/popniñas.php">Niñas Pop</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Solar
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="pages/solarhombre.php">Solar Hombre</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="pages/solarmujer.php">Solar Mujer</a></li>
            </ul>
          </li>
          <li class="nav-item">
             
          <?php if (isset($_SESSION['user_name'])) : ?>
            <!-- Si la sesión está iniciada, muestre un carrito diferente -->
            <a class="nav-link text-white" href="pages/exam.php">Agenda Examen</a>
        </a>
          <?php else : ?>
            <!-- Si el usuario no ha iniciado sesión, si no, que lo mande a registrarse -->
            <a class="nav-link text-white" href="pages/login.php">Agenda Examen</a>
        </a>
          <?php endif; ?>
          </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!--banner-->
  <div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/banner.jpg" class="d-block w-100 h-100 " alt="banner 1">
        </div>
        <div class="carousel-item">
          <img src="images/banner1.jpg" class="d-block w-100" alt="banner 2">
        </div>

      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>




  <section class="container-fluid mb-4 mt-4">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-5">
          <img src="images/imagen2.2.jpg" alt="sobre nosotros" class="img-fluid">
        </div>
        <div class="col-12 col-lg-7">
          <h2>Conócenos</h2>
          <p>
            Bienvenido a nuestra tienda de lentes y centro de exámenes de la vista. Nos enorgullece ofrecer una amplia gama de productos ópticos y servicios profesionales para satisfacer todas tus necesidades visuales.
          </p>
          <p>
            En nuestra tienda, encontrarás una gran variedad de lentes de contacto, gafas graduadas, gafas de sol y accesorios de las marcas más reconocidas del mercado. Nuestro equipo de expertos ópticos está siempre dispuesto a ayudarte a encontrar la opción perfecta que se ajuste a tu estilo y necesidades visuales.
          </p>
          <p>
            Además, contamos con un moderno y completo laboratorio donde realizamos exámenes de la vista exhaustivos para evaluar tu salud ocular y determinar la prescripción más precisa para tus lentes. Nuestros optometristas altamente capacitados utilizan tecnología de vanguardia para garantizar resultados precisos y una atención personalizada.
          </p>
          <p>
            En nuestra tienda, nos comprometemos a brindarte una experiencia excepcional y un servicio al cliente de primera calidad. Nos esforzamos por superar tus expectativas y asegurarnos de que salgas con una visión clara y una sonrisa en el rostro.
          </p>
          <p>
            Te invitamos a visitarnos y descubrir todo lo que nuestra tienda de lentes y centro de exámenes de la vista tiene para ofrecer. Estamos ansiosos por atenderte y ayudarte a mejorar tu salud visual. ¡Conócenos hoy mismo!
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="content-card-style-6 mt-100 pt-95 pb-100 ">
    <div class="container">
      <div class="row justify-content-center ">
        <div class="col-lg-6 ">
          <div class="content-card-title text-center pb-30 ">
            <h6 class="sub-title">Pop Accesorios &amp; Pop Lentes</h6>
            <h2 class="main-title">
              Aquí encontrarás todo lo que necesitas <br>
              Y lo que buscas
            </h2>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-4 col-sm-9">
          <div class="single-content-card text-center mt-30">
            <div class="content-card-image">
              <img src="images/imagen4.jpg" alt="lente adulto" class="img-fluid">
            </div>
            <div class="content-card-content">
              <h4><a href="#0" class="h4 font-weight-bold text-decoration-none">Pop Adultos</a></h4>
              <p>Tenemos los mejores lentes para hombres y mujeres</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-9">
          <div class="single-content-card text-center mt-30">
            <div class="content-card-image">
              <img src="images/imagen3.jpg" alt="lente solar" class="img-fluid">
            </div>
            <div class="content-card-content">
              <h4><a href="#0" class="h4 font-weight-bold text-decoration-none">Pop solares</a></h4>
              <p>Contamos con los mejores y mas atractivos lentes solares</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-9">
          <div class="single-content-card text-center mt-30">
            <div class="content-card-image">
              <img src="images/imagen4.jpg" alt="lente niños" class="img-fluid">
            </div>
            <div class="content-card-content">
              <h4><a href="#0" class="h4 font-weight-bold text-decoration-none">Pop niños</a></h4>
              <p>Tenemos los mejores accesorios para tus lentes</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="container-fluid mb-4 mt-4">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-5">
          <img src="images/icon.png" alt="sobre nosotros" class="img-fluid">
        </div>
        <div class="col-12 col-lg-7">
          <h2 class="text-center mt-4">Misión</h2>
          <p>
            Promover el plan de salud visual pública en las empresas de la Laguna y el norte del país, a través del programa de salud visual. Contribuir a la sociedad y a las empresas ofreciendo servicios de examen de la vista, asesoría clínica visual y venta de anteojos y lentes de contacto.
          </p>
          <h2 class="text-center">Visión</h2>
          <p>
            Ser líderes en la promoción del plan de salud visual en las empresas de la Laguna y el norte del país, mediante un programa integral de salud visual. Brindar valor a la sociedad y a las empresas a través de servicios de examen de la vista, asesoría clínica visual y compra de anteojos y lentes de contacto.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section id="team" class="container py-3">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="display-6"><b>Más vendidos</b></h2>
        <p class="">aquí se te presentaran los productos mas vendidos</p>
      </div>
    </div>






    <div class="row pt-5">
      <div class="col-12 col-lg-10 offset-lg-1">
        <div class="row">
        <!--muestra los productos mas vendidos-->
        <?php
        foreach($vendidos as $producto)
        {?>
          <div class="col-12 col-lg-4 text-center mb-4 mb-lg-0">
            <div class="single-content-card">
              <img class="card-img-top" src="<?php echo 'productosimg/'.$producto['IMAGEN']; ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title h4"><?php echo $producto['nombre']; ?></h5>
                <a class="h4 font-weight-bold text-decoration-none" href="pages/prodejem.php?id=<?php echo $producto['sku']; ?>">
                  <p class="card-text h5">$<?php echo $producto['precio']; ?> MXN</p>
                </a>
              </div>
            </div>
          </div>
          <?php
        }
        ?>

        </div>
      </div>
    </div>

  </section>

  <section class="content-card-style-9 bg_cover mt-100 d-flex justify-content-center">
    <div class="position-relative">
      <img src="images/imagen7.jpg" alt="examen" class="img-fluid">
        
      <?php if (isset($_SESSION['user_name'])) : ?>
            <!-- Si la sesión está iniciada, muestre un carrito diferente -->
            <a href="pages/exam.php" class="btn btn-primary custom-button">Agenda tu examen</a>
        </a>
          <?php else : ?>
            <!-- Si el usuario no ha iniciado sesión, si no, que lo mande a registrarse -->
            <a href="pages/login.php" class="btn btn-primary custom-button">Agenda tu examen</a>
        </a>
          <?php endif; ?>
      
    </div>
  </section>


  <section id="contact" class="bg-light py-3">
    <div class="container">
      <div class="row py-2">
        <div class="col-12 text-center">
          <h2 class="display-6 "><b>Contactanos</b></h2>
          <p>Nos interesa saber tu opinion</p>
        </div>

      </div>
      <div class="row">
        <div class="col-12 col-lg-5 text-center">
          <img class="img-fluid" src="images/imagen2.jpg" alt="contactanos">
        </div>
        <div class="col-12 col-lg-7">
          <div class="">
            <form action="">
              <div class="form-floating">
                <input required type="text" class="form-control rounded-0" id="floatingName" placeholder="Tu nombre">

              </div>
              <div class="form-floating mt-3">
                <input required type="email" class="form-control rounded-0" id="floatingInput" placeholder="name@example.com">

              </div>
              <div class=" mt-3">
                <textarea required class="form-control rounded-0" placeholder="Deja un comentario" id="floatingTextarea" cols="30" rows="4"></textarea>
              </div>
              <div class="mt-3">
                <button class="btn btn-primary w-100 rounded-0" type="submit">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>




  <!--footer-->
  <footer class="container-fluid border border-black footer bg-dark text-white">

    <!--Footer superio-->
    <div class="row p-5 text-aling-center">

      <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
        <h3>Pop Ópticos</h3>
        <a href="index.php"><img src="images/icon64.png" alt=""></a>

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
          <a class="text-decoration-none text-white" href="mailto:ventas@opticapop.com">ventas@opticapop.com</a>
        </div>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
        <p class="h5">Redes</p>
        <div class="mb-2">
          <a href="https://www.facebook.com/opticaPOP/"><img src="images/facebook.png" alt=""></a>
        </div>
        <div class="mb-0">
          <p>Facebook</p>
        </div>
        <div class="mb-2">
          <a href="https://wa.link/35sn9o"><img src="images/whatsapp.png" alt=""></a>
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

  </footer>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>