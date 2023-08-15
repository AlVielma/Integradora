<?php
session_start();

require_once __DIR__ . '/../src/modelos/Carrito.php';

use App\Modelos\Carrito;

// Crear un objeto de la clase Carrito
$carritoModelo = new Carrito();

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['user_id'])) {
    $usuario_id = $_SESSION['user_id'];

    // Verificar si se ha realizado una búsqueda
    if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];
        $detalle = $carritoModelo->buscarApartadosPorUsuario($usuario_id, $searchTerm);
    } else {
        // Si no se ha realizado una búsqueda, obtener todos los detalles de los apartados del usuario
        $detallesCompras = $carritoModelo->obtenerDetallesCompraPorUsuario($usuario_id);
    }
} else {
    // Si el usuario no ha iniciado sesión, redirigir a la vista login.php
    header("Location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--Css-->
    <link rel="stylesheet" href="/../css/usuario.css">
    <!--Icon-->
    <link rel="icon" href="/../images/icon.png">
    <title>Pop Ópticos</title>
</head>

<body>
    <?php
    include 'header.php'
    ?>

   

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center mb-4">Mis Apartados</h2>
                <form action="pendientesfin.php" method="GET" autocomplete="off">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Buscar apartados..." name="search" aria-label="Buscar pedidos" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Contenedor para todos los detalles de compra -->
    <div class="container">
    <?php if (isset($_GET['search'])) : ?>
    <?php foreach ($detalle as $detalleCompra) : ?>
        <!-- Mostrar el id de compra y estado -->
        <div class="text-center mb-3">
            <h3>Folio: <?php echo $detalleCompra['id_compra']; ?></h3>
            <p>Estado: <?php echo $detalleCompra['estado']; ?></p>
        </div>
        <!-- Mostrar detalles de los productos asociados a la compra -->
        <div class="container border border-black mt-4 mb-4">
        
            <?php foreach ($detalleCompra['productos'] as $producto) : ?>
                <h2 class="text-center"><?php echo $producto['nombre_producto']; ?></h2>
                <div class="row">
                    <div class="col-md-4">
                    <img src="<?php echo '../productosimg/' . $producto['imagen_ruta']; ?>" alt="Imagen del producto" class="img-fluid" width="489" height="463">
                    </div>
                    <div class="col-md-8">
                        <p class="lead font-weight-bold"><?php echo $producto['descripcion']; ?></p>
                        <p class="lead font-weight-bold">Precio Unitario: $<?php echo number_format($producto['precio'], 2); ?> MXN</p>
                        <p class="lead font-weight-bold">Pop Ópticos</p>
                        <!-- Resto del contenido del producto -->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="cantidad" class="form-label">Cantidad:</label>
                                <!-- Mostrar la cantidad en un label o texto -->
                                <span><?php echo $producto['cantidad']; ?></span>
                                <p class="lead font-weight-bold">Total: $<?php echo number_format($producto['total_producto'], 2); ?> MXN</p>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-3 border-top border-5"></div>
            <?php endforeach; ?>

            </div>
            
        <?php endforeach; ?>
        <?php else : ?>

            <?php foreach ($detallesCompras as $detalleCompra) : ?>
        <!-- Mostrar el id de compra y estado -->
        <div class="text-center mb-3">
            <h3>Folio: <?php echo $detalleCompra['id_compra']; ?></h3>
            <p>Estado: <?php echo $detalleCompra['estado']; ?></p>
        </div>
        <!-- Mostrar detalles de los productos asociados a la compra -->
        <div class="container border border-black mt-4 mb-4">
        
            <?php foreach ($detalleCompra['productos'] as $producto) : ?>
                <h2 class="text-center"><?php echo $producto['nombre_producto']; ?></h2>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo '../productosimg/' . $producto['imagen_ruta']; ?>" alt="Imagen del producto" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <p class="lead font-weight-bold"><?php echo $producto['descripcion']; ?></p>
                        <p class="lead font-weight-bold">Precio Unitario: $<?php echo number_format($producto['precio'], 2); ?> MXN</p>
                        <p class="lead font-weight-bold">Pop Ópticos</p>
                        <!-- Resto del contenido del producto -->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="cantidad" class="form-label">Cantidad:</label>
                                <!-- Mostrar la cantidad en un label o texto -->
                                <span><?php echo $producto['cantidad']; ?></span>
                                <p class="lead font-weight-bold">Total: $<?php echo number_format($producto['total_producto'], 2); ?> MXN</p>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-3 border-top border-5"></div>
            <?php endforeach; ?>

            </div>
           
        <?php endforeach; ?>
        <?php endif;?>
    </div>
    

    <?php
    include 'footer.php';
    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>