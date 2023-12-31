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
    <link rel="stylesheet" href="/../css/usuario.css">
    <!--Icon-->
    <link rel="icon" href="/../images/icon.png">
    <title>Pop Ópticos</title>
</head>
<body> 
  
    <?php include 'header.php';
    ?>
           
    <div class="container mt-5">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <img src="/../images/icon2.png" width="200" height="200" alt="">
        </div>
        <div class="col-4 imagenes">
            <?php if (isset($_SESSION['user_name'])) { ?>
                <div class="row"><img src="/../images/usuarioblack.png" alt=""></div>
                <br>
                <div class="row"><img src="/../images/sobre.png" alt=""></div>
                <br>
                <div class="row"><img src="/../images/cerrar.png" alt=""></div>
                <br>
                <div class="row"><img src="/../images/salir-alt.png" alt=""></div>
            <?php } ?>
        </div>

        <div class="col-4 ">
            <?php if (isset($_SESSION['user_name'])) { ?>
                <div class="row">
                    <p><?php echo $_SESSION['user_name']; ?></p>
                </div>
                <br>
                <div class="row">
                    <p><?php echo $_SESSION['user_email']; ?></p>
                </div>
                <br>
                <div class="row">
                    <a href="" class="objeto-texto">Cambiar contraseña</a>
                </div>
                <br>
                <div class="row">
                    <a href="../index.php" class="objeto-texto">Salir</a>
                </div>
                <br>
            <?php } ?>
        </div>
    </div>
</div>

            
            <!--footer-->
            <?php
           include 'footer.php';
           ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>