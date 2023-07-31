<?php
session_start();
require_once __DIR__ . '/../../src/modelos/Carrito.php';

use App\Modelos\Carrito;


// Obtener el ID de la compra a confirmar desde el parámetro en la URL
if (isset($_GET['id'])) {
    $usuario_id = $_GET['usuario_id'];
    $compra_id = $_GET['id'];

    // Crear un objeto de la clase Carrito
    $carritoModelo = new Carrito();

    // Confirmar la compra
    $carritoModelo->confirmarCompra($compra_id,$usuario_id);

    echo '<script>alert("Orden Confirmada");</script>';
    
    // Redirigir de regreso a la lista de detalles de compras
    header("Location: pendientes.php");
    exit;
} else {
    // Si no se proporcionó el ID de la compra, redirigir a la página de detalles de compras
    header("Location: pendientes.php");
    exit;
}
