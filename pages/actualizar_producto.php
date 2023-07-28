<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__.'/../src/modelos/Carrito.php';

use App\Modelos\Carrito;

$carritoModelo = new Carrito();

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['user_id'])) {
    // Obtener el ID del usuario actual desde la sesión
    $usuario_id = $_SESSION['user_id'];

    // Obtener el SKU del producto a actualizar desde la solicitud POST
    $sku = $_POST['sku'];
    $cantidad = $_POST['cantidad'];

    // Actualizar la cantidad del producto en el carrito
    $carritoModelo->actualizarProducto($usuario_id, $sku, $cantidad);

    // Redirigir al usuario de vuelta al carrito
    header('Location: carrito.php');
    exit();
} else {
    // El usuario no ha iniciado sesión
    // Redirigir al usuario a la página de inicio de sesión
    header('Location: login.php');
    exit();
}
?>