<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Modelos\Trabajador;
use App\Modelos\Conexion;
use App\Modelos\validacionesRegistrar;

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

      if($registrar->esNulo([$nombre, $apellido, $email, $contraseña])){
        $errors[] = "Debe de llenar todos los campos";
      }
  
      if(!$registrar->esEmail($email)){
          $errors[] = "La direccion de correo no es valida";
      }
  
      if($registrar->emailExist($email, $con)){
          $errors[] = "El correo electronico $email ya existe";
      }

      if (count($errors) == 0) {
        $password_hash = password_hash($contraseña, PASSWORD_DEFAULT);
        // Agregar el quinto argumento id_rol con valor 1
        // Solo si el correo no existe previamente
        $db->agregar($nombre, $apellido, $email, $password_hash, 1);
        $successMessage = "El trabajador se agregó exitosamente.";

        // Redireccionar después de procesar el formulario
        header("Location: trabaj.php");
        exit();
      }
    }
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

<body>
  <div class="sidebar" id="sidebar">
    <div class="logo">
      <img src="../img/logo.jpg" alt="Logo">
    </div>
    <a class="nav-link" href="aggimg.php"><i class="fas fa-box"></i><span>Gestionar Producto</span></a>
    <a class="nav-link" href="trabaj.php"><i class="fas fa-users"></i><span>Gestionar Trabajadores</span></a>
    <a class="nav-link" href="agenda.php"><i class="fas fa-calendar-alt"></i><span>Gestionar Agenda</span></a>
    <a class="nav-link" href="consulta.php"><i class="fas fa-stethoscope"></i><span>Realizar Consulta</span></a>
    <a class="nav-link" href="receta.php"><i class="fas fa-prescription"></i><span>Generar Receta</span></a>
    <a class="nav-link" href="../index.php"><i class="fas fa-sign-out-alt"></i><span>Cerrar Sesión</span></a>
  </div>


  <div class="container-fluid py-5" id="content">
    <h1 class="mb-4">Agregar Trabajador</h1>
    <div>
      <?php $registrar->mostrarMensajes($errors); ?>
    </div>
    <form id="agregarForm" class="row g-3 needs-validation" method="post">
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
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tabla as $fila) : ?>
              <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['apellido']; ?></td>
                <td><?php echo $fila['email']; ?></td>
                <td>
                  <!-- Agrega el atributo data-bs-target para especificar el destino del modal -->
                  <a href="../../src/http/eliminartrabajador.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger"><img src="../img//circulo-x.png" alt="Eliminar"></a>
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
</body>

</html>