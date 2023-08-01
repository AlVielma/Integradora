
<!--Header-->
<header class="header">
    <!--Barra navegacion-->
    <nav class="navbar navbar-expand-lg bg-black">
        <div class="container-fluid">

            <a class="navbar-brand text-white" href="../index.php">
                <img src="../images/icon.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                Pop Ópticos
            </a>

            <div class="container-fluid">
                <form class="d-flex" role="search" method="POST" action="busqueda.php">
                    <input class="form-control me-2 busqueda" type="search" placeholder="Search" aria-label="Search"
                        name="busqueda">
                </form>
            </div>

            <?php
            if (isset($_SESSION['user_id']) && $_SESSION['user_rol'] == 1) {
              // Si el usuario es el administrador, redirigir a otra página 
              header("Location: ../admin/app/aggimg.php"); 
              exit;
            }
            
            use App\Modelos\Carrito;
            require_once __DIR__ . '/../vendor/autoload.php';
            require_once __DIR__ . '/../src/modelos/Carrito.php';

            $carrito = new Carrito();

            // Verificar si el usuario ha iniciado sesión y si el carrito está vacío
            $carritoVacio = true;
            if (isset($_SESSION['user_id'])) {
                if (!empty($carrito->obtenerProductosCarrito($_SESSION['user_id']))) {
                    $carritoVacio = false;
                }
            }
            ?>

            <!-- Mostrar el ícono del carrito y enlazarlo a la página correspondiente -->
            <?php if (isset($_SESSION['user_id'])) : ?>
                <!-- Si el usuario ha iniciado sesión, redirigir al carrito correspondiente -->
                <?php if ($carritoVacio) : ?>
                    <!-- Si el carrito está vacío, redireccionar a la página incarejem.php -->
                    <a class="navbar-brand text-white" href="incarejem.php">
                        <img src="../images/carrito.png" alt="Logo" class="d-inline-block align-text-top carrito-icono">
                    </a>
                <?php else : ?>
                    <!-- Si el carrito NO está vacío, redireccionar a la página prodencar.php -->
                    <a class="navbar-brand text-white" href="prodencar.php">
                        <img src="../images/carrito.png" alt="Logo" class="d-inline-block align-text-top carrito-icono">
                    </a>
                <?php endif; ?>
            <?php else : ?>
                <!-- Si el usuario no ha iniciado sesión, redireccionar a la página car.php -->
                <a class="navbar-brand text-white" href="car.php">
                    <img src="../images/carrito.png" alt="Logo" class="d-inline-block align-text-top carrito-icono">
                </a>
            <?php endif; ?>


            <!-- Si la sesión está iniciada, muestra el nombre del usuario en lugar del icono -->
            <?php if (isset($_SESSION['user_name'])) : ?>
                <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"
                    class="user-link text-white">
                    <?php echo $_SESSION['user_name']; ?>
                </a>

            <?php else : ?>
                <!-- Si el usuario no ha iniciado sesión, muestra el icono predeterminado -->
                <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                    <img src="../images/usuario.png" width="35" height="35" alt="Usuario">
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
              <i class="h5">¡Bienvenido!</i>
            <?php else : ?>
              <!-- Si el usuario no ha iniciado sesión, muestra el mensaje predeterminado -->
              <i class="h5">¡Bienvenido!</i>
            <?php endif; ?>
          </div>
        </div>

        <div class="row mx-5 text-center justify-content-center">
          <?php if (isset($_SESSION['user_name'])) : ?>
            <!-- Si la sesión está iniciada, muestra las opciones para el usuario logueado -->
            <a href="perfil.php" class="objeto-texto h3">Ver perfil</a>
            <a href="../src/http/logout.php" class="objeto-texto h3">Cerrar sesión</a>
          <?php else : ?>
            <!-- Si el usuario no ha iniciado sesión, muestra las opciones para iniciar sesión o registrarse -->
            <a href="login.php" class="objeto-texto h3">Inicia Sesión</a>
            <a href="register.php" class="objeto-texto h3">Regístrate</a>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!--Barra catalogos-->
    <nav class="navbar navbar-expand-lg bg-dark justify-content-center">
      <div class="container-fluid">
        <button class="navbar-toggler border border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar"><img src="../images/menu-hamburguesa.png" alt="Hamburgues" width="20" height="20"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Adultos
              </a>
              <ul class="dropdown-menu">
              
            </li>
            <li><a class="dropdown-item" href="pophombres.php">Pop Hombre</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="popmujer.php">Pop Mujer</a></li>
          </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Solar
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="solarhombre.php">Solar Hombre</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="solarmujer.php">Solar Mujer</a></li>
            </ul>
          </li>
          <li class="nav-item">
            
          <?php if (isset($_SESSION['user_name'])) : ?>
            <!-- Si la sesión está iniciada, muestre un carrito diferente -->
            <a class="nav-link text-white" href="exam.php">Agenda Examen</a>
        </a>
          <?php else : ?>
            <!-- Si el usuario no ha iniciado sesión, si no, que lo mande a registrarse -->
            <a class="nav-link text-white" href="login.php">Agenda Examen</a>
        </a>
          <?php endif; ?>
           
          </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
