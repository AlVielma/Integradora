<?php
session_start();
require_once __DIR__ . '/../../src/modelos/Carrito.php';

use App\Modelos\Carrito;

// Obtener el ID de la compra a cancelar desde el parámetro en la URL
if (isset($_GET['id'])) {
    $compra_id = $_GET['id'];

    $carritoModelo = new Carrito();

    // Cancelar la compra
    $carritoModelo->cancelarCompra($compra_id);

    // Mostrar mensaje de "Orden Cancelada"
    echo '<script>alert("Orden Cancelada");</script>';

    // Redirigir de regreso a la lista de detalles de compras
    header("Location: pendientes.php");
    exit;
} else {
    // Si no se proporcionó el ID de la compra, redirigir a la página de detalles de compras
    header("Location: pendientes.php");
    exit;
}