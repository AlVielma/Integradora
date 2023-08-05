
<?php
 use App\Modelos\Conexion;
 USE App\Modelos\validacionesRegistrar;
// Incluir las clases y la conexión a la base de datos
require_once __DIR__.'/../src/modelos/Conexion.php';
require_once __DIR__.'/../src/modelos/validacionesRegistrar.php';

// Crear una instancia de validacionesRegistrar
$registrar = new validacionesRegistrar();

// Establecer la conexión a la base de datos
$conexion = new Conexion();
$con = $conexion->conectar();


// Verificar si se envió el formulario de verificación
if (!empty($_POST) && isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $token = trim($_POST['token']);

    // Realizar la verificación del token en la base de datos
    $verificarToken = $registrar->verificarToken($email, $token, $con);

    if ($verificarToken) {
        // El token es válido, cambiar el estado del usuario a "activo" (estado_id = 5)
        $registrar->actualizarEstadoUsuario($email,5, 1, $con);

        // Redireccionar a una página de verificación exitosa o mostrar un mensaje de éxito
        header("Location: login.php");
        exit;
    } else {
        // El token no es válido, mostrar un mensaje de error o redireccionar a una página de error
        header("Location: verificacion_usuario.php");
        exit;
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
    <title>Verificar Usuario</title>
   
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
                    <h2 class="mb-4">Verificar Usuario</h2>
                    <form action="verificacion_usuario.php" method="POST" autocomplete="off">
                        <div class="mb-3">
                            <label for="token" class="form-label">Token</label>
                            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                            <input type="text" class="form-control" id="token" name="token" placeholder="Ingresa tu token">
                        </div>
                        <div class="text-center">
                            <input class="btn btn-primary" type="submit" value="Verificar" name="submit">
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



