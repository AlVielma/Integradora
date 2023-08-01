<?php
session_start();
require_once __DIR__ . '/../../src/modelos/Carrito.php';

use App\Modelos\Carrito;

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id']) || $_SESSION['user_rol'] != 1) {
    // Si el usuario no ha iniciado sesión o no tiene rol de admin, redirigir al index (página de usuario)
    header("Location: ../../pages/login.php");
    exit;
  }
// Obtener el ID de la compra a cancelar desde el parámetro en la URL
if (isset($_GET['id'])) {
    $usuario_id = $_GET['usuario_id'];
    $compra_id = $_GET['id'];

    // Crear un objeto de la clase Carrito
    $carritoModelo = new Carrito();

    // Cancelar la compra
    $carritoModelo->cancelarCompra($compra_id,$usuario_id);

    // Redirigir de regreso a la lista de detalles de compras
    header("Location: pendientes.php");
    exit;
} else {
    // Si no se proporcionó el ID de la compra, redirigir a la página de detalles de compras
    header("Location: pendientes.php");
    exit;
}