<?php
session_start();
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
            <?php include 'header.php';
    ?>
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
                    <h1 class="text-start text-black ms-5">Pop Mujer</h1>
                    </div>
                    <!-- Filtrador -->
                    <div class="col-md-2 text-md-end">
                        <select id="filter-category" class="form-select border border-black">
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