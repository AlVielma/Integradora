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
            <a href="login.html" class="btn btn-light btn-outline-dark">Inicia sesión en tu cuenta</a>
        </div>
        <div class="mb-3">
            <p class="lead">¿No tienes una cuenta?</p>
        </div>
        <div class="mb-3 border-top border-5"></div>
    
        <div class="mb-3">
            <a href="register.html" class="btn btn-light btn-outline-dark ">Regístrate</a>
        </div>
    </div>
    

    <!--footer-->
    <div class="container-fluid border border-black footer bg-dark text-white ">

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