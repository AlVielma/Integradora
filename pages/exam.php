<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
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

                <a class="navbar-brand text-white" href="#">
                    <img src="../images/icon.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    Pop Ópticos
                </a>

                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 busqueda" type="search" placeholder="Search"
                            aria-label="Search">
                    </form>
                </div>

                <a class="navbar-brand text-white" href="#">
                    <img src="../images/carrito.png" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top">
                </a>
                <a class="navbar-brand text-white" href="#">
                    <img src="../images/usuario.png" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>
        <!--Barra catalogos-->
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler border border-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar"><img src="../images/menu-hamburguesa.png" alt="Hamburgues" width="20"
                            height="20"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">

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


    <!--Iconos y la bienvenida a la seccion-->
    <section id="container-fluid">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="header text-center">
                    <h2 class="text-uppercase mb-3 mt-4 allies-title">Pop Ópticos te invita a sacar tu examen de la vista!</h2>
                </div>
            </div>
        </div>
        <div class="row mt-4 text-center">
            <div class="d-flex flex-wrap justify-content-center">
                <div class="col-12 col-md-4 col-lg-3 step mx-3 mt-4 mt-lg-0">
                    <div class="img-box">
                        <img class="mx-auto d-block w-75 img-fluid" src="../images/iconogafas1.png" alt="icon lentes">
                    </div>
                    <small class="d-block mt-2 mb-4 pb-md-3 pb-lg-0 steps-title">
                        <strong>¿No tienes dinero?</strong>
                    </small>
                    <span class="steps-description">
                        <small>Tu examen es completamente gratuito</small>
                    </span>
                </div>
                <div class="col-12 col-md-4 col-lg-3 step mx-3 mt-4 mt-lg-0">
                    <div class="img-box">
                        <img class="mx-auto d-block w-75 img-fluid" src="../images/iconogafas2.png" alt="icon examen">
                    </div>
                    <small class="d-block mt-2 mb-4 steps-title">
                        <strong>Receta inmediata</strong>
                    </small>
                    <span class="steps-description">
                        <small>Al momento de realizar tu examen, tu receta se te dará inmediatamente</small>
                    </span>
                </div>
                <div class="col-12 col-md-4 col-lg-3 step mx-3 mt-4 mt-lg-0">
                    <div class="img-box">
                        <img class="mx-auto d-block w-75 img-fluid" src="../images/iconogafas3.png" alt="icon examen">
                    </div>
                    <small class="d-block mt-2 mb-4 steps-title">
                        <strong>Visítanos cuando quieras</strong>
                    </small>
                    <span class="steps-description">
                        <small>Nos ajustamos a tus horarios y tus preferencias</small>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!--Boton de agendar examen-->

    <section class="container-fluid mb-4 mt-4">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-5">
              <img src="../images/iconogafas4.png" alt="icon" class="img-fluid">
            </div>
            <div class="col-12 col-lg-7 d-flex align-items-center justify-content-center">
                <button class="btn btn-light btn-outline-dark btn-lg" data-bs-toggle="modal" data-bs-target="#myModal">Agenda ahora</button>
            </div>
                    
          </div>
        </div>
      </section>
    

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Agenda tu examen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!--Formulario-->
                <form action="../src/http/correocitas.php" method="POST">
                    <div class="form-group">
                        <label for="nombre" class="text-center">Nombre del paciente:</label>
                        <input type="text" class="form-control w-75 mx-auto" id="nombre" name="nombre" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="text-center">Teléfono:</label>
                        <input type="tel" class="form-control w-75 mx-auto" id="telefono" name="telefono" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento" class="text-center">Fecha de nacimiento:</label>
                        <input type="date" class="form-control w-75 mx-auto" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="dia" class="text-center">Día:</label>
                        <input type="date" class="form-control w-75 mx-auto" id="dia" name="dia" required>
                    </div>
                    <div class="form-group">
                        <label for="hora" class="text-center">Hora:</label>
                        <input type="time" class="form-control w-75 mx-auto" id="hora" name="hora" required>
                    </div>
                    <div class="form-group">
                        <label for="sintomas_oculares" class="text-center">Síntomas oculares:</label>
                        <textarea class="form-control w-75 mx-auto" id="sintomas_oculares" name="sintomas_oculares"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="enfermedades_oculares" class="text-center">Enfermedades oculares:</label>
                        <textarea class="form-control w-75 mx-auto" id="enfermedades_oculares" name="enfermedades_oculares"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="lentes_actualmente" class="text-center">¿Usa lentes actualmente?</label>
                        <select class="form-control w-75 mx-auto" id="lentes_actualmente" name="lentes_actualmente" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="armazon" class="text-center">¿Necesita armazón?</label>
                        <select class="form-control w-75 mx-auto" id="armazon" name="armazon" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contacto" class="text-center">¿Usa lentes de contacto?</label>
                        <select class="form-control w-75 mx-auto" id="contacto" name="contacto" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ultimo_examen" class="text-center">Fecha del último examen:</label>
                        <input type="date" class="form-control w-75 mx-auto" id="ultimo_examen" name="ultimo_examen" required>
                    </div>
                    <div class="form-group">
                        <label for="uso_gotas" class="text-center">¿Usa gotas oculares?</label>
                        <select class="form-control w-75 mx-auto" id="uso_gotas" name="uso_gotas" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
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
                    <a class="text-decoration-none text-white"
                        href="mailto:ventas@opticapop.com">ventas@opticapop.com</a>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <p class="h5">Redes</p>
                <div class="mb-2">
                    <a href="https://www.facebook.com/opticaPOP/"><img src="../images/facebook.png" alt=""></a>
                </div>
                <div class="mb-0">
                    <p>Facebook</p>
                </div>
                <div class="mb-2">
                    <a href="https://wa.link/35sn9o"><img src="../images/whatsapp.png" alt=""></a>
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

    <!--Javascript-->
    <!--Script de la api de leaflet-->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <!--Script de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
        crossorigin="anonymous"></script>
</body>

</html>