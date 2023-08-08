<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__.'/../src/modelos/Carrito.php';

use App\Modelos\Carrito;

$carrito = new Carrito();

if (isset($_POST['producto_id'], $_POST['cantidad'])) {

    $usuario_id = $_SESSION['user_id'];
    $producto_id = $_POST['producto_id'];
    $cantidad = (int)$_POST['cantidad'];

   // Aquí asignamos el estado_id correspondiente a "Inactivo" (1) al agregar el producto al carrito
   $estado_id = 1;

    if ($cantidad <= 0) {
        // Manejar el caso cuando la cantidad sea inválida (menor o igual a cero)
        $_SESSION['mensaje_exito'] = "La cantidad debe ser mayor a cero";
        header("Location: prodejem.php?id=" . $producto_id);
        exit;
    }

    $carrito->agregarProducto($usuario_id, $producto_id, $cantidad, $estado_id);

    header("Location: prodejem.php?id=" . $producto_id);
    exit;
}
?>

