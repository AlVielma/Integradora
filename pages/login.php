<?php

use App\Modelos\Conexion;
use App\Modelos\validacionesRegistrar;

require __DIR__ . '/../vendor/autoload.php';

$registrar = new validacionesRegistrar();
$conexion = new Conexion(); // Crear una instancia de la clase Conexion
$con = $conexion->conectar(); // Llamar al método conectar() de la instancia de Conexion

$errors = [];

if (!empty($_POST)) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    if ($registrar->esNulo([$email, $password])) {
        $errors[] = "Debe de llenar todos los campos";
    }

    if (count($errors) == 0) {

        $errors[] = $registrar->login($email, $password, $con);
    }
}
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
    <link rel="stylesheet" href="../css/index.css">
    <!--Icon-->
    <link rel="icon" href="images/icon.png">
    <title>Pop Ópticos</title>
</head>

<body>
    <!--Header-->
    <header class="header">
        <!--Barra navegacion-->
        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container-fluid">

                <a class="navbar-brand text-white" href="#">
                    <img src="../images/icon.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top mx-auto">
                    Pop Ópticos
                </a>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="border rounded border-light shadow-sm p-4 bg-white">
                    <div class="text-center mb-4">
                        <img src="../images/user-circle.png" alt="Imagen" class="img-fluid">
                    </div>
                    <h2 class="mb-4">Inicio de Sesión</h2>

                    <?php $registrar->mostrarMensajes($errors); ?>

                    <form action="login.php" method="post" autocomplete="off">
                        <div class="mb-3 form-floating">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
                            <label for="email" class="form-label">Correo electrónico</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                            <label for="password" class="form-label">Contraseña</label>
                        </div>
                        <div class="col-12">
                            <a href="recupera.php">¿Olvidaste tu contraseña?</a>
                        </div>
                        <button type="submit" class="btn btn-light btn-outline-dark">Iniciar sesión</button>
                        <a href="register.php" class="btn btn-light btn-outline-dark">Regístrate</a>
                    </form>

                </div>
            </div>
        </div>
    </div>




    <!-- Scripts de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>


</body>

</html>