<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <!--Css-->
    <link rel="stylesheet" href="/../css/usuario.css">
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

                <a class="navbar-brand text-white" href="/../index.html">
                    <img src="/../images/icon.png" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top">
                    Pop Ópticos
                </a>

                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 busqueda" type="search" placeholder="Search"
                            aria-label="Search">
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
                                <li><a class="dropdown-item" href="solarhombre.php">Solar Hombre</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="solarmujer.php">Solar Mujer</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="exam.pho">Agenda Examen</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
           

            <div class="container mt-5">
              <div class="row">
                <div class="col-4">
                  <img src="/../images/icon2.png" width="200" height="200" alt="">
                </div>
                <div class="col-4 imagenes">
                  <div class="row"><img src="/../images/usuarioblack.png" alt=""></div>
                  <br>
                  <div class="row"><img src="/../images/sobre.png" alt=""></div>
                  <br>
                  <div class="row"><img src="/../images/cerrar.png" alt=""></div>
                  <br>
                  <div class="row"><img src="/../images/salir-alt.png" alt=""></div>
                </div>

                <div class="col-4 ">
                  <div class="row">
                    <p>nombre</p>
                  </div>
                  <br>
                  <div class="row">
                    <p>correo electronico</p>
                  </div>
                  <br>
                  <div class="row">
                    <a href="" class="objeto-texto">cambiar contraseña</a>
                  </div>
                  <br>
                  <div class="row">
                    <a href="" class="objeto-texto">Salir</a>
                  </div>
                  <br>
                </div>
                
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
                    <a class="text-decoration-none text-white" href="mailto:ventas@opticapop.com">ventas@opticapop.com</a>
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