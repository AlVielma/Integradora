<?php
session_start();
require __DIR__.'/../../vendor/autoload.php';
use App\Modelos\Clientespop;
require_once __DIR__.'/../../src/modelos/Clientespop.php';

$clientesPop = new Clientespop();
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

if (!empty($busqueda)) {
    $clientes = $clientesPop->buscarClientesPorNombreApellido($busqueda);
} else {
    $clientes = $clientesPop->obtenerUsuariosConEstado();
}

$alerta = '';

if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_GET['action'] === 'activar') {
        if ($clientesPop->activarUsuario($id)) {
            $alerta = '<div id="alerta" class="alert alert-success" role="alert">Cliente activado exitosamente.</div>';
        } else {
            $alerta = '<div id="alerta" class="alert alert-warning" role="alert">Error al activar el cliente.</div>';
        }
    } elseif ($_GET['action'] === 'desactivar') {
        if ($clientesPop->desactivarUsuario($id)) {
            $alerta = '<div id="alerta" class="alert alert-danger" role="alert">Cliente desactivado exitosamente.</div>';
        } else {
            $alerta = '<div id="alerta" class="alert alert-warning" role="alert">Error al desactivar el cliente.</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buscar Clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/admin/css/produc.css">
    <style>
        /* Estilo para clientes activados */
        .cliente-activo {
            background-color: #c5e1a5; /* Color de fondo verde */
        }
        .cliente-inactivo {
            background-color: #ffcdd2; 
        }
    </style>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <br>
    <div class="container-fluid" id="content">
        <div class=""></div>
        <h2>Clientes Pop</h2>

        <!-- Mostrar la alerta -->
        <?php echo $alerta; ?>

        <!-- Formulario de búsqueda -->
        <form method="get" action="">
        <!-- <div class="input-group mb-3">
                <input type="text" class="form-control" name="busqueda" placeholder="Buscar por nombre o apellido" value="<?php echo htmlspecialchars($busqueda); ?>">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>-->

        <div class="input-group mb-3">
            <input type="text" class="form-control" name="busqueda" placeholder="Buscar por nombre o apellido" value="<?php echo htmlspecialchars($busqueda); ?>">
            <button class="btn btn-outline-primary" type="submit" style="border-color: #ccc;">Buscar</button>
        </div>



        </form>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Estado</th> <!-- Nueva columna -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $usuario): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['apellido']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['estado']); ?></td>
                            <td>
                                <a href="?action=desactivar&id=<?php echo htmlspecialchars($usuario['id']); ?>" class="btn btn-danger"><img src="../../images/circulo-x.png" alt=""></a>
                                <a href="?action=activar&id=<?php echo htmlspecialchars($usuario['id']); ?>" class="btn btn-success"><img src="../../images/controlar.png" alt=""></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Script para ocultar la alerta después de 5 segundos -->
    <button class="collapse-button hidden" id="collapseButton"><i class="fas fa-bars"></i></button>
    <script>
        setTimeout(function() {
            document.getElementById('alerta').style.display = 'none';
        }, 3000);
    </script>
    
    <script src="/admin/js/boton.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
