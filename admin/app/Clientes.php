<?php
/*Clientes.php*/
session_start();
use App\Modelos\Clientespop;
require_once __DIR__.'/../../src/modelos/Clientespop.php';

$clientesPop = new Clientespop();
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
$clientes = $clientesPop->buscarUsuariosConRolDos($busqueda);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Buscar Clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/admin/css/produc.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<br>
<div class="container-fluid" id="content">
    <div class="">
    </div>
    <h2>Clientes Pop</h2>
    
    <!-- Formulario de búsqueda -->
    <form method="get" action="">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="busqueda" placeholder="Buscar por nombre o apellido" value="<?php echo $busqueda; ?>">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>
    
    <div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($clientes as $cliente)
        {
        ?>
        <tr>
        <td><?php echo $cliente['nombre']; ?></td>
        <td><?php echo $cliente['apellido']; ?></td>
        <td><?php echo $cliente['email']; ?></td>
        <td>
        <?php if (isset($cliente['estado_id']) && $cliente['estado_id'] == 1) { ?>
            <!-- Botón para desactivar -->
            <a href="?action=desactivar&id=<?php echo $cliente['id']; ?>" class="btn btn-danger">Desactivar</a>
        <?php } elseif (isset($cliente['estado_id']) && $cliente['estado_id'] == 2) { ?>
            <!-- Botón para activar -->
            <a href="?action=activar&id=<?php echo $cliente['id']; ?>" class="btn btn-success">Activar</a>
        <?php } ?>
        </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    </div>
</div>
</body>
</html>