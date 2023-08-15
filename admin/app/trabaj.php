<?php
require __DIR__ . '/../../vendor/autoload.php';
session_start();
/*trabaj.php*/
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id']) || $_SESSION['user_rol'] != 1) {
  // Si el usuario no ha iniciado sesión o no tiene rol de admin, redirigir al index (página de usuario)
  header("Location: ../../pages/login.php");
  exit;
}

use App\Modelos\Trabajador;
use App\Modelos\Conexion;
use App\Modelos\validacionesRegistrar;
require_once __DIR__.'/../../src/modelos/trabajador.php';
require_once __DIR__.'/../../src/modelos/Conexion.php';
require_once __DIR__.'/../../src/modelos/validacionesRegistrar.php';

$db = new Trabajador();
$conexion = new Conexion();
$tabla = $db->mostrar();
$con = $conexion->conectar(); // Llamar al método conectar() de la instancia de Conexion
$registrar = new validacionesRegistrar();

$successMessage = $errorMessage = '';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['contraseña'])) {
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $email = $_POST['email'];
      $contraseña = $_POST['contraseña'];

      if ($registrar->esNulo([$nombre, $apellido, $email, $contraseña])) {
          $errors[] = "Debe de llenar todos los campos";
      }

      if (!$registrar->esEmail($email)) {
          $errors[] = "La dirección de correo no es válida";
      }

      if ($registrar->emailExist($email, $con)) {
          $errors[] = "El correo electrónico $email ya existe";
      }

      if (count($errors) == 0) {
          $password_hash = password_hash($contraseña, PASSWORD_DEFAULT);
          $db->agregar($nombre, $apellido, $email, $password_hash, 1);
          $successMessage = "El trabajador se agregó exitosamente.";

          // Redireccionar después de procesar el formulario
          header("Location: trabaj.php");
          exit();
      }
  }
}

if (isset($_GET['action']) && isset($_GET['id'])) {
  $id = $_GET['id'];

  if ($_GET['action'] === 'activar') {
      if ($db->activarUsuario($id)) {
          $alerta = '<div id="alerta" class="alert alert-success" role="alert">Trabajador activado exitosamente.</div>';
      } else {
          $alerta = '<div id="alerta" class="alert alert-warning" role="alert">Error al activar el trabajador.</div>';
      }
  } elseif ($_GET['action'] === 'desactivar') {
      if ($db->desactivarUsuario($id)) {
          $alerta = '<div id="alerta" class="alert alert-danger" role="alert">Trabajador desactivado exitosamente.</div>';
      } else {
          $alerta = '<div id="alerta" class="alert alert-warning" role="alert">Error al desactivar el trabajador.</div>';
      }
  }

  header("Location: trabaj.php");
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Administrador de Trabajadores</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="/admin/css/trab.css">
</head>

<!--Sidebar-->
<?php include 'sidebar.php';
?>

  <div class="container-fluid py-5" id="content">
    <h1 class="mb-4">Agregar Trabajador</h1>
    <div>
      <?php $registrar->mostrarMensajes($errors); ?>
    </div>
    <form id="agregarForm" class="row g-3 needs-validation" method="post" autocomplete="off">
      <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" placeholder="Ingresa el nombre">
        <div class="invalid-feedback">
          Por favor, ingresa un nombre válido.
        </div>
      </div>
      <div class="col-md-6">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control form-control-sm" id="apellido" name="apellido" placeholder="Ingresa el apellido">
        <div class="invalid-feedback">
          Por favor, ingresa un apellido válido.
        </div>
      </div>
      <div class="col-md-6">
        <label for="gmail" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Ingresa el correo electrónico">
        <div class="invalid-feedback">
          Por favor, ingresa un correo electrónico válido.
        </div>
      </div>
      <div class="col-md-6">
        <label for="contraseña" class="form-label">Contraseña</label>
        <input type="password" class="form-control form-control-sm" id="contraseña" name="contraseña" placeholder="Ingresa una contraseña">
        <div class="invalid-feedback">
          Por favor, ingresa una contraseña válida.
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Agregar</button>
      </div>
    </form>

    <div class="col-12 p-3">
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Email</th>
              <th scope="col">Estado</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tabla as $fila) : ?>
              <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['apellido']; ?></td>
                <td><?php echo $fila['email']; ?></td>
                <td><?php echo $fila['estado']; ?></td>
                <td>
                <a href="?action=activar&id=<?php echo $fila['id']; ?>" class="btn btn-success"><img src="../../images/controlar.png" alt=""></a>
<a href="?action=desactivar&id=<?php echo $fila['id']; ?>" class="btn btn-danger"><img src="../../images/circulo-x.png" alt=""></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <button class="collapse-button hidden" id="collapseButton"><i class="fas fa-bars"></i></button>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/admin/js/agregartra.js"></script>
  <script src="/admin/js/boton.js"></script>
  <script>
        setTimeout(function() {
            document.getElementById('alerta').style.display = 'none';
        }, 3000);
    </script>
</body>

</html>