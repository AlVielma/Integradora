<?php
use App\Modelos\Conexion;
use App\Modelos\Usuario;
use App\Modelos\validacionesUsuario;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$conexion = new Conexion();
$con = $conexion->conectar();

$validacionesUsuario = new validacionesUsuario();

$errors = [];

if (!empty($_POST)) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validar el formato del correo electrónico
    if (!$validacionesUsuario->validarFormatoEmail($email)) {
        $errors[] = "El formato del correo electrónico no es válido.";
    }

    // Validar las credenciales con la base de datos
    if (!$validacionesUsuario->validarCredenciales($email, $password, $con)) {
        $errors[] = "La contraseña no coincide o el usuario no fue encontrado.";
    }

    if (empty($errors)) {
        $usuario = new Usuario($con);
        $userData = $usuario->login($email, $password);

        // Inicio de sesión exitoso, almacenar datos en las variables de sesión
        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['user_email'] = $userData['email'];
        $_SESSION['user_name'] = $userData['nombre'];
        $_SESSION['user_lastname'] = $userData['apellido'];
        $_SESSION['user_rol'] = $userData['id_rol'];

        // Redirigir al usuario según su rol
        if ($_SESSION['user_rol'] == 1) {
            header("Location: ../admin/app/aggimg.php");
            exit;
        } else {
            header("Location: ../index.php");
            exit;
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
                    <div class="col-12 d-flex justify-content-center">
                        <h2 class="mb-4">Inicio de Sesión</h2>
                    </div>

                    <!-- Formulario de inicio de sesión -->
                    <form action="login.php" method="post" autocomplete="off">
                        <div class="mb-3 form-floating">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
                            <label for="email" class="form-label">Correo electrónico</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                            <label for="password" class="form-label">Contraseña</label>
                        </div>

                        <!-- Mostrar errores -->
                        <?php if (!empty($errors)): ?>
                            <div class="col-12 d-flex justify-content-center mt-3">
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li><?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="col-12 d-flex justify-content-center">
                            <a href="recupera.php">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-light btn-outline-dark">Iniciar sesión</button>
                            <a href="register.php" class="btn btn-light btn-outline-dark">Regístrate</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
