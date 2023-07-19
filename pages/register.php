<?php
use App\Modelos\Conexion;
require __DIR__ . '/../vendor/autoload.php';
require '../src/modelos/modelos.php';

$conexion = new Conexion(); // Crear una instancia de la clase Conexion
$con = $conexion->conectar(); // Llamar al método conectar() de la instancia de Conexion

if(!empty($_POST)){
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confpassword = trim($_POST['confpassword']);

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $id = registrarCliente([$nombre, $apellido, $email, $password_hash], $con);

    header("Location: ../index.php");
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
        <div class="row justify-content-center ">
            <div class="col-lg-8 ">
                <div class="border rounded border-light shadow-sm p-4 bg-white">
                    <div class="text-center mb-4">
                        <img src="../images/icon.png" alt="Imagen" class="img-fluid col-6 col-md-4 col-lg-3">
                    </div>
                    <h2 class="mb-4">Nuevo Usuario Pop</h2>
                    <form action="register.php" method="POST" autocomplete="off">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="confpassword" name="confpassword" placeholder="Confirma tu contraseña" required>
                        </div>
                        <div class="text-center">
                            <input type="submit" value="registro" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <!-- Scripts de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></>


</body>

</html>