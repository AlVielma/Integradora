<?php
use App\Modelos\Conexion;
use App\Modelos\validacionesRegistrar;
require_once __DIR__.'/../src/modelos/Conexion.php';
require_once __DIR__.'/../src/modelos/validacionesRegistrar.php';

require __DIR__ . '/../vendor/autoload.php';

session_start();

$registrar = new validacionesRegistrar();
$conexion = new Conexion(); // Crear una instancia de la clase Conexion
$con = $conexion->conectar(); // Llamar al método conectar() de la instancia de Conexion

// Verificar si el usuario ya ha iniciado sesión
if(isset($_SESSION['user_id'])) {
    // Redirigir al usuario según su rol
   if($_SESSION['user_rol'] == 1){
       header("Location: ../admin/app/aggimg.php");
   }
   else {
       header("Location: ../index.php");
   }
   exit;
}

$errors = [];

if(!empty($_POST)){
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confpassword = trim($_POST['confpassword']);

    $nombres = $registrar->filtrarString($nombre);
    $apellidos = $registrar->filtrarString($apellido);
    $passwordd = $registrar->filtrarString($password);
    $confpasswords=$registrar->filtrarString($confpassword);

    if($registrar->esNulo([$nombre, $apellido, $email, $password, $confpassword])){
        $errors[] = "Debe de llenar todos los campos";
    }

    if(!$registrar->esEmail($email)){
        $errors[] = "La direccion de correo no es valida";
    }

    if(!$registrar->validarContr($password, $confpassword)){
        $errors[] = "Las contraseñas no coinciden";
    }

    /*if($registrar->usuarioExist($nombre, $con)){
        $errors[] = "El nombre de usuario $nombre ya existe";
    }*/

    if($registrar->emailExist($email, $con)){
        $errors[] = "El correo electronico $email ya existe";
    }

    if(count($errors) == 0){

        if($nombres==$nombre && $apellidos==$apellido && $password==$passwordd && $confpasswords==$confpassword)
        {
            $password_hash = password_hash($passwordd, PASSWORD_DEFAULT);
            $nombresinj=$registrar->sqlinj($nombres);
            $apelliinj=$registrar->sqlinj($apellidos);
            $registrar->registrarCliente([$nombresinj, $apelliinj, $email, $password_hash], $con);
    
            header("Location: ../index.php");
        }
        else{
            $errors[] = "ERROR AL INGRESO DE DATOS";
        }
       
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
    
                <a class="navbar-brand text-white" href="../index.php">
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
                        <div>
                            <?php $registrar->mostrarMensajes($errors); ?>
                        </div>
                    <form action="register.php" method="POST" autocomplete="off">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa tu apellido" value="<?php echo isset($_POST['apellido']) ? htmlspecialchars($_POST['apellido']) : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="confpassword" name="confpassword" placeholder="Confirma tu contraseña" value="<?php echo isset($_POST['confpassword']) ? $_POST['confpassword'] : ''; ?>">
                        </div>
                        <div class="text-center">
                            <input class="btn btn-primary" type="submit" value="registro" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <!-- Scripts de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>


</body>

</html>