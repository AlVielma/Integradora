<?php
session_start();
?>
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
    <?php include 'header.php';
    ?>

    <!--Contenido-->
    <div class="card-body text-center mt-5 mb-5">
        <div class="mb-3">
            <h5 class="display-6 fw-bold">Tu carrito está vacío</h5>
        </div>
        <div class="mb-3">
            <a href="popunisex.php" class="btn btn-light btn-outline-dark">Seguir comprando</a>
        </div>
        <div class="mb-3 border-top border-5"></div>
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
    <?php
           include 'footer.php';
           ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
        crossorigin="anonymous"></script>
</body>

</html>