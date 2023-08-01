
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
            <a href="login.php" class="btn btn-light btn-outline-dark">Inicia sesión en tu cuenta</a>
        </div>
        <div class="mb-3">
            <p class="lead">¿No tienes una cuenta?</p>
        </div>
        <div class="mb-3 border-top border-5"></div>
    
        <div class="mb-3">
            <a href="register.php" class="btn btn-light btn-outline-dark ">Regístrate</a>
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