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
        $fecha_pedido = date("Y-m-d"); // Obtener la fecha actual
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
}
