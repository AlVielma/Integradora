<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["sku"])) {
    $sku = $_POST["sku"];

    // Verificar si el producto existe en el carrito
    if (isset($_SESSION["carrito"][$sku])) {
        // Eliminar el producto del carrito
        unset($_SESSION["carrito"][$sku]);
    }
}

// Redireccionar al carrito después de eliminar el producto
header("Location: prodencar.php");
exit;
?>