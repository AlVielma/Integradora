<?php
// Iniciar sesión para utilizar sesiones
session_start();

use App\Modelos\RecuperarContra;
use App\Modelos\Validacionrecu;

require_once __DIR__.'/../src/modelos/recuperarcontra.php';
require_once __DIR__.'/../src/modelos/validacionrecu.php'; 

$validacionrecu = new Validacionrecu();

// Variables para almacenar mensajes
$error = "";
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    if (isset($_POST['email']) && isset($_POST['contraseñanueva']) && isset($_POST['confirmarcontraseña'])) {
        $email = $_POST['email'];
        $newPassword = $_POST['contraseñanueva']; // Nueva contraseña
        $confirmNewPassword = $_POST['confirmarcontraseña']; // Confirmar nueva contraseña

        // Validar el email
        if (!$validacionrecu->esEmail($email)) {
            $error = "El email no es válido.";
        }

        // Validar las contraseñas
        if (!$validacionrecu->validarContraseña($newPassword, $confirmNewPassword)) {
            $error = "Las contraseñas no coinciden.";
        }

        // Crear una instancia de la clase RecuperarContra
        $recuperarContra = new RecuperarContra();

        // Obtener el ID del usuario por su correo electrónico
        $idUsuario = $recuperarContra->obtenerIdUsuarioPorEmail($email);

        // Verificar si el usuario no fue encontrado (ID es false o -1)
        if ($idUsuario === false || $idUsuario === -1) {
            $error = "El correo electrónico ingresado no coincide con ningún usuario.";
        } else {
            // Cambiar la contraseña del usuario
            if ($recuperarContra->cambiarContraseña($idUsuario, $newPassword)) {
                // Mensaje de éxito
                $_SESSION['exito'] = true;
                // Redirigir a esta página para evitar el reenvío del formulario
                header("Location: recupera.php");
                exit();
            } else {
                $error = "Hubo un error al cambiar la contraseña.";
            }
        }
    } else {
        $error = "Por favor, completa todos los campos del formulario.";
    }
}

if (isset($_SESSION['exito']) && $_SESSION['exito'] === true) {
    $mensaje = "La contraseña se cambió exitosamente.";
    // Limpiar la variable de sesión para que el mensaje no aparezca en futuros refrescos
    unset($_SESSION['exito']);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" href="images/icon.png">
    <title>Pop Ópticos</title>
</head>
<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container-fluid">
                <a class="navbar-brand text-white">
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
                        <img src="../images/icon.png" alt="Imagen" class="img-fluid col-6 col-md-4 col-lg-3">
                    </div>
                    <h2 class="mb-4">Cambiar Tu Contraseña Pop</h2>
                    <?php if (!empty($mensaje)): ?>
                        <div class="mensaje text-success">
                            <p><?php echo $mensaje; ?></p>
                            <p class="text-center">Por favor, presiona <a href="../index.php" class="text-primary">Pop Ópticos</a> para continuar en nuestra página.</p>
                        </div>
                    <?php endif; ?>
                    <form action="recupera.php" method="POST" autocomplete="off">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($error) && !$validacionrecu->esEmail($email)): ?>
                                <p class="error"><?php echo $error; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="contraseñanueva" class="form-label">Nueva contraseña</label>
                            <input type="password" class="form-control" id="contraseñanueva" name="contraseñanueva">
                        </div>
                        <div class="mb-3">
                            <label for="confirmarcontraseña" class="form-label">Confirmar nueva contraseña</label>
                            <input type="password" class="form-control" id="confirmarcontraseña" name="confirmarcontraseña">
                        </div>
                        <div class="text-center">
                            <input class="btn btn-primary" type="submit" value="Confirmar" name="submit">
                        </div>
                        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($error) && ($newPassword !== $confirmNewPassword)): ?>
                            <p class="error"><?php echo "Las contraseñas no coinciden."; ?></p>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
      history.replaceState(null,null,location.pathname);
    </script>
</body>
</html>
