<?php
session_start();
use App\Modelos\Conexion;
use App\Modelos\validacionesRegistrar;

// Agrega este bloque al inicio del archivo para verificar la sesión
if (isset($_SESSION['user_id'])) {

    // Redirigir al usuario según su rol
    if ($_SESSION['user_rol'] == 1) {
        header("Location: ../admin/app/aggimg.php");
    } else {
        header("Location: ../index.php");
    }
    exit;
}



/*verificacion_usuario.php*/
require_once __DIR__.'/../src/modelos/Conexion.php';
require_once __DIR__.'/../src/modelos/validacionesRegistrar.php';

$registrar = new validacionesRegistrar();
$conexion = new Conexion();
$con = $conexion->conectar();

$message = "";

if (!empty($_POST) && isset($_POST['submit'])) {
    try {
        // Obtenemos el ID de sesión almacenado previamente
        $id = $_SESSION['id'];
        
        // Obtenemos el token y lo sanitizamos
        $token = trim($_POST['token']);
        
        // Realizamos la verificación del token en la base de datos
        $verificarToken = $registrar->verificarToken($id, $token, $con);
        
        if ($verificarToken) {
            // El token es válido, cambiar el estado del usuario a "activo" (estado_id = 5)
            $estado_id = 5;
            $estatus = 1;
            $updateResult = $registrar->actualizarEstadoUsuario($id, $estado_id, $estatus, $con);

            if ($updateResult) {
                // Redireccionamos a una página de verificación exitosa o mostramos un mensaje de éxito
                header("Location: login.php");
                exit;
            } else {
                $message = "Error al actualizar el estado del usuario";
            }
        } else {
            // El token no es válido, establecemos el mensaje de error
            $message = "Token incorrecto";
        }
    } catch (\PDOException $e) {
        // Handle database errors
        $message = "Error en la base de datos: " . $e->getMessage();
    } catch (\Exception $e) {
        // Handle other errors
        $message = "Error: " . $e->getMessage();
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
                <a class="navbar-brand text-white" href="login.php">
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
                    <div class="alert alert-warning mt-3" role="alert">
                    Favor de verificar su correo Se le ha enviado un código de verificación.
                    </div>
                    <form action="verificacion_usuario.php" method="POST" autocomplete="off">
                        <div class="mb-3">
                            <label for="token" class="form-label">Código de verificación</label>
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                            <input type="text" class="form-control" id="token" name="token" placeholder="Ingrese su código de verificación">
                        </div>
                        <div class="text-center">
                            <input class="btn btn-primary" type="submit" value="Verificar" name="submit" onclick="markVerified()" >
                        </div>
                        <?php if (!empty($message)) : ?>
                            <div class="alert alert-danger mt-3"><?php echo $message; ?></div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
    var verified = false;

    window.addEventListener('beforeunload', function (event) {
        if (!verified) {
            var confirmationMessage = '¿Estás seguro de querer salir? Si abandonas, los cambios no se guardarán.';
            event.returnValue = confirmationMessage;
            return confirmationMessage;
        }
    });

    // Esta función marca al usuario como verificado y permite que salga sin alerta
    function markVerified() {
        verified = true;
    }
</script>

</body>
</html>
