<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';

use App\Modelos\Carrito;
use App\Modelos\productos;

// Crear un objeto de la clase Carrito
$carrito = new Carrito();

if (isset($_POST['producto_id'])) {
    // Obtener el ID del usuario actual desde la sesión (asumiendo que ya inició sesión)
    $usuario_id = $_SESSION['user_id'];

    // Obtener el ID del producto que se va a agregar al carrito
    $producto_id = $_POST['producto_id'];

    // Agregar el producto al carrito
    $carrito->agregarProducto($usuario_id, $producto_id);

    // Redirigir de vuelta a la página de detalle del producto
    header("Location: prodejem.php?id=" . $producto_id);
    exit;
}

$productosModelo = new productos();
?>

