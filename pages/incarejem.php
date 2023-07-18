<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--Css-->
    <link rel="stylesheet" href="../css/index.css">
    <!--Icon-->
    <link rel="icon" href="../images/icon.png">
    <title>Pop Ópticos</title>
</head>

<body>

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
                                <li><a class="dropdown-item" href="#">Pop Unisex</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Pop Hombre</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Pop Mujer</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Niños
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Niños Pop</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Niñas Pop</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Solar
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Solar Hombre</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Solar Mujer</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Agenda Examen</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--Contenido-->
    <div class="card-body text-center mt-5 mb-5">
        <div class="mb-3">
            <h5 class="display-6 fw-bold">Tu carrito está vacío</h5>
        </div>
        <div class="mb-3">
            <a href="#" class="btn btn-light btn-outline-dark">Seguir comprando</a>
        </div>
        <div class="mb-3 border-top border-5"></div>
        <div class="mb-3">
            <a href="#" class="btn btn-light btn-outline-dark ">Regístrate</a>
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
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
              <div class="card" style="width: 19rem;">
                <a href="#"><img src="../images/lentes2.png" class="card-img-top" alt="..."></a>
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
                <a href="index.html"><img src="images/icon64.png" alt=""></a>

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
        crossorigin="anonymous"></script>
</body>

</html>