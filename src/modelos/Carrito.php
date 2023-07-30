<?php

namespace App\Modelos;

require_once 'Conexion.php';
require_once 'productos.php';

use App\Modelos\Conexion;
use App\Modelos\productos;


class Carrito
{
    private $conexion;
    private $pdo;

    public function __construct()
    {
        // Inicializar la conexión a la base de datos en el constructor
        $this->conexion = new Conexion();
        $this->pdo = $this->conexion->conectar();
    }

    public function agregarProducto($usuario_id, $producto_id, $cantidad, $estado_id)
    {
        // Obtener el precio del producto desde la base de datos
        $productosModelo = new productos();
        $producto = $productosModelo->consultaeedit($producto_id);
        $precio = $producto[0]['precio'];

        // Insertar el producto en la tabla "Carritos"
        $total = $precio * $cantidad;

        $agregarCarrito = $this->pdo->prepare("INSERT INTO Carritos (usuario, producto_id, cantidad, total, estado_id) VALUES (?, ?, ?, ?, ?)");
        $agregarCarrito->execute([$usuario_id, $producto_id, $cantidad, $total, $estado_id]);
    }

    public function eliminarProducto($usuario_id, $producto_id)
    {
        $eliminarCarrito = $this->pdo->prepare("DELETE FROM Carritos WHERE usuario = ? AND producto_id = ?");
        $eliminarCarrito->execute([$usuario_id, $producto_id]);
    }

    public function obtenerProductosCarrito($usuario_id)
    {
        $obtenerCarrito = $this->pdo->prepare("SELECT c.id, p.sku, p.nombre, p.descripcion, p.precio, c.cantidad, i.IMAGEN, c.total
                                              FROM Carritos c 
                                              INNER JOIN Productos p ON c.producto_id = p.sku
                                              INNER JOIN Imagenes i ON p.imagen = i.id_img
                                              WHERE c.usuario = ?");
        $obtenerCarrito->execute([$usuario_id]);
        $productosCarrito = $obtenerCarrito->fetchAll(\PDO::FETCH_ASSOC);

        return $productosCarrito;
    }

    public function obtenerProductosCarritoEstado1($usuario_id)
    {
        $obtenerCarrito = $this->pdo->prepare("SELECT c.id, p.sku, p.nombre, p.descripcion, p.precio, c.cantidad, i.IMAGEN, c.total
                                               FROM Carritos c 
                                               INNER JOIN Productos p ON c.producto_id = p.sku
                                               INNER JOIN Imagenes i ON p.imagen = i.id_img
                                               WHERE c.usuario = ? AND c.estado_id = 1");
        $obtenerCarrito->execute([$usuario_id]);
        $productosCarrito = $obtenerCarrito->fetchAll(\PDO::FETCH_ASSOC);

        return $productosCarrito;
    }

    public function actualizarProducto($usuario_id, $producto_id, $cantidad)
    {
        // Obtener el precio del producto desde la base de datos
        $productosModelo = new productos();
        $producto = $productosModelo->consultaeedit($producto_id);
        $precio = $producto[0]['precio'];

        // Actualizar la cantidad y el total del producto en la tabla "Carritos"
        $total = $precio * $cantidad;

        $actualizarCarrito = $this->pdo->prepare("UPDATE Carritos SET cantidad = ?, total = ? WHERE usuario = ? AND producto_id = ?");
        $actualizarCarrito->execute([$cantidad, $total, $usuario_id, $producto_id]);
    }
    public function finalizarCompra($usuario_id)
    {
        // Obtener los productos del carrito para el usuario actual
        $productosCarrito = $this->obtenerProductosCarritoEstado1($usuario_id);

        // Calcular el total de la compra
        $totalCompra = calcularTotal($productosCarrito);

        // Crear una nueva instancia de la clase DateTime para obtener la fecha actual
        $fecha_pedido = new \DateTime();
        $fecha_pedido = $fecha_pedido->format('Y-m-d');

        // Iniciar una transacción para garantizar la consistencia de la base de datos
        $this->pdo->beginTransaction();

        try {
            // Insertar los detalles de la compra en la tabla DetalleCompra
            $insertarDetalle = $this->pdo->prepare("INSERT INTO DetalleCompra (usuario_id, fecha_pedido, total, estado_id) VALUES (?, ?, ?, ?)");
            $insertarDetalle->execute([$usuario_id, $fecha_pedido, $totalCompra, 2]);

            // Obtener el ID de la compra recién realizada
            $compra_id = $this->pdo->lastInsertId();

            // Actualizar el estado de los productos en la tabla Carritos
            $actualizarEstado = $this->pdo->prepare("UPDATE Carritos SET estado_id = 2 WHERE usuario = ? AND estado_id = 1");
            $actualizarEstado->execute([$usuario_id]);

            // Confirmar la transacción
            $this->pdo->commit();

            return $compra_id;
        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            $this->pdo->rollBack();
            throw $e;
        }
    }
    public function obtenerDetallesCompras()
    {
        $obtenerDetalles = $this->pdo->query("SELECT dc.id, u.nombre as nombre_cliente, u.apellido as apellido_cliente, dc.fecha_pedido, dc.total, dc.estado_id
                                              FROM DetalleCompra dc 
                                              INNER JOIN Usuarios u ON dc.usuario_id = u.id
                                              ORDER BY dc.fecha_pedido DESC");
        $detallesCompras = $obtenerDetalles->fetchAll(\PDO::FETCH_ASSOC);

        return $detallesCompras;
    }

    // Función para cambiar el estado de una compra a "Finalizado" (3)
    public function confirmarCompra($compra_id)
    {
        $actualizarEstado = $this->pdo->prepare("UPDATE DetalleCompra SET estado_id = 3 WHERE id = ?");
        $actualizarEstado->execute([$compra_id]);
    }

    // Función para cambiar el estado de una compra a "Inactivo" (1)
    public function cancelarCompra($compra_id)
    {
        $actualizarEstado = $this->pdo->prepare("UPDATE DetalleCompra SET estado_id = 1 WHERE id = ?");
        $actualizarEstado->execute([$compra_id]);
    }

}
