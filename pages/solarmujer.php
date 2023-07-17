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
                    <a href="login.php" class="objeto-texto h3">Inicia Sesion</a>
                    <a href="register.php" class="objeto-texto h3">Registrate</a>
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
                            <a class="nav-link text-white" href="exam.php">Agenda Examen</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
            <!--banner-->
            <div id="carouselExample" class="carousel slide container-fluid">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/../images/banner1.jpg" class="d-block w-100" alt="..." height="height="900px">
                  </div>
                </div>
               
             </div>
          
             <!--Contenido Recomendados-->
             <div class="mt-3 container-fluid titulos-azul">
               <!-- Titulo -->
                <div class="row border border-3 border-secondary align-items-center p-2 mb-4">
                    <div class="col-md-8">
                    <h1 class="text-start text-black ms-5">Solar Mujer</h1>
                    </div>
                    <!-- Filtrador -->
                    <div class="col-md-2 text-md-end ">
                        <select id="filter-category" class="form-select border border-black ">
                            <option value="">Filtrar por:</option>
                            <option value="sunglasses">Mas vendidos</option>
                            <option value="optical">Precio: Mayor a Menor</option>
                            <option value="sunglasses">Precio: Menor a Mayor</option>
                        </select>
                    </div>
                    <div class="col-md-2 ">
                        <h5 class=" text-black">Cantidad:</h5>
                    </div>
                </div>

                <!--fila-->
                <div class="row text-start">
                  <!--lentes5-->
                  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
                    <div class="card" style="width: 19rem;">
                      <a href="#"><img src="/../images/lentes5.png" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title h4">Ky 0004</h5>
                        <a class="objeto-texto" href="#"><p class="card-text h5">$1899,00 MXN</p></a>
                      </div>
                    </div>
                  </div>
                  <!--lentes6-->
                  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
                    <div class="card" style="width: 19rem;">
                      <a href="#"><img src="/../images/lentes6.png" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title h4">Silver Seven</h5>
                        <a class="objeto-texto" href="#"><p class="card-text h5">$2299,00 MXN</p></a>
                      </div>
                    </div>
                  </div>
                  <!--lentes7-->
                  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
                    <div class="card" style="width: 19rem;">
                      <a href="#"><img src="/../images/lentes7.png" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title h4">Kipling 4065</h5>
                        <a class="objeto-texto" href="#"><p class="card-text h5">$1999,00 MXN</p></a>
                      </div>
                    </div>
                  </div>
                  <!--lentes8-->
                  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
                    <div class="card" style="width: 19rem;">
                      <a href="#"><img src="/../images/lentes8.png" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title h4">Cloe25288</h5>
                        <a class="objeto-texto" href="#"><p class="card-text h5">$2599,00 MXN</p></a>
                      </div>
                    </div>
                  </div>
                  <!--lentes3-->
                  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
                    <div class="card" style="width: 19rem;">
                      <a href="#"><img src="/../images/lentes3.png" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title h4">Ky Eyewear 0091</h5>
                        <a class="objeto-texto" href="#"><p class="card-text h5">$1699,00 MXN</p></a>
                      </div>
                    </div>
                  </div>
                   <!--lentes4-->
                   <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
                    <div class="card" style="width: 19rem;">
                      <a href="#"><img src="/../images/lentes4.png" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title h4">Axess clip solar 2717</h5>
                        <a class="objeto-texto" href="#"><p class="card-text h5">$2799,00 MXN</p></a>
                      </div>
                    </div>
                  </div>
                   <!--lentes1-->
                   <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
                    <div class="card" style="width: 19rem;">
                      <a href="#"><img src="/../images/lentes1.png" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title h4">Kipling 1116</h5>
                        <a class="objeto-texto" href="#"><p class="card-text h5">$1990,00 MXN</p></a>
                      </div>
                    </div>
                  </div>
                    <!--lentes2-->
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
                      <div class="card" style="width: 19rem;">
                        <a href="#"><img src="/../images/lentes2.png" class="card-img-top" alt="..."></a>
                        <div class="card-body">
                          <h5 class="card-title h4">Ky Eyewear 3556</h5>
                          <a class="objeto-texto" href="#"><p class="card-text h5">$1699,00 MXN</p></a>
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