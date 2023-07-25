<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_name'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al inicio de sesión
    header("Location: login.php");
    exit;
}

// Verificar si se envió el formulario para agregar al carrito
if (isset($_POST['agregar_al_carrito'])) {
    // Obtener el ID del producto que se va a agregar al carrito
    $producto_id = $_POST['producto_id'];

    // Verificar si el producto ya existe en el carrito
    if (isset($_SESSION['carrito'][$producto_id])) {
        // Si el producto ya existe en el carrito, mostrar un mensaje de error
        $_SESSION['error'] = "El producto ya está en el carrito.";
    } else {
        // Si el producto no existe en el carrito, agregarlo
        $_SESSION['carrito'][$producto_id] = 1; // La cantidad por defecto es 1
        $_SESSION['success'] = "El producto se agregó al carrito exitosamente.";
    }

    // Redirigir de vuelta a la página de detalle del producto
    header("Location: prodejem.php?id=" . $producto_id);
    exit;
} else {
    // Si no se envió el formulario de agregar al carrito, redirigir a la página de inicio
    header("Location: ../index.php");
    exit;
}
?>
