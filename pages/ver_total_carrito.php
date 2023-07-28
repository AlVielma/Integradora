<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__.'/../src/modelos/Carrito.php';
require_once __DIR__.'/../src/modelos/productos.php';

use App\Modelos\Carrito;
use App\Modelos\productos;

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión o mostrar un mensaje de error.
    header("Location: login.php");
    exit;
}

// Crear un objeto de la clase Carrito
$carritoModelo = new Carrito();
$productosModelo = new productos();

// Obtener el ID del usuario actual desde la sesión
$usuario_id = $_SESSION['user_id'];

// Obtener los productos del carrito para el usuario actual desde la base de datos
$productosCarrito = $carritoModelo->obtenerProductosCarrito($usuario_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--Css-->
    <link rel="stylesheet" href="../css/index.css">
    <!--Icon-->
    <link rel="icon" href="../images/icon.png">
    <title>Ver Total del Carrito</title>
</head>

<body>
    <!--Header-->
    <?php include 'header.php'; ?>

    <!--Contenido-->
    <div class="container mt-4 mb-4">
        <h2 class="text-center">Total del Carrito</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalCarrito = 0;
                foreach ($productosCarrito as $producto) {
                    $nombre = $producto['nombre'];
                    $cantidad = $producto['cantidad'];
                    $precio = $producto['precio'];
                    $totalProducto = $cantidad * $precio;
                    $totalCarrito += $totalProducto;
                ?>
                    <tr>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $cantidad; ?></td>
                        <td>$<?php echo number_format($precio, 2); ?></td>
                        <td>$<?php echo number_format($totalProducto, 2); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end fw-bold">Total del Carrito:</td>
                    <td>$<?php echo number_format($totalCarrito, 2); ?></td>
                </tr>
            </tfoot>
        </table>

        <div class="text-center">
            <!-- Opción para finalizar la compra -->
            <a href="finalizar_compra.php" class="btn btn-success btn-lg">Finalizar Compra</a>
        </div>
    </div>

    <!--footer-->
    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>
