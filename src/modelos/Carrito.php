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

    public function verificarProductoEnCarrito($producto_id, $usuario_id)
    {
        $ver = $this->pdo->prepare("SELECT COUNT(*) FROM Carritos WHERE producto_id = ? AND usuario = ? AND estado_id= 1");
        $ver->execute([$producto_id, $usuario_id]);
        $cuent = $ver->fetchColumn();
        return ($cuent > 0);
    }

    public function contarProductosDiferentesEnCarrito($usuario_id)
    {
        $contarProductos = $this->pdo->prepare("SELECT COUNT(DISTINCT producto_id) FROM Carritos WHERE usuario = ? AND estado_id = 1");
        $contarProductos->execute([$usuario_id]);
        return $contarProductos->fetchColumn();
    }


    public function agregarProducto($usuario_id, $producto_id, $cantidad, $estado_id)
{
    // Verificar si el producto ya está en el carrito
    if ($this->verificarProductoEnCarrito($producto_id, $usuario_id)) {
        $_SESSION['mensaje'] = 'El producto ya está en el carrito.';
        return; // El producto ya está en el carrito, no lo agregamos nuevamente
    }

    // Verificar si ya se han agregado 5 productos diferentes al carrito
    if ($this->contarProductosDiferentesEnCarrito($usuario_id) >= 5) {
        $_SESSION['mensaje'] = 'Ya ha alcanzado el límite de 5 productos diferentes en el carrito.';
        return; // No se permite agregar más productos diferentes al carrito
    }

    // Obtener el precio del producto desde la base de datos
    $productosModelo = new productos();
    $producto = $productosModelo->consultaeedit($producto_id);
    $precio = $producto[0]['precio'];

    $total = $precio * $cantidad;

    $agregarCarrito = $this->pdo->prepare("INSERT INTO Carritos (usuario, producto_id, cantidad, total, estado_id) VALUES (?, ?, ?, ?, ?)");
    $agregarCarrito->execute([$usuario_id, $producto_id, $cantidad, $total, $estado_id]);

    $_SESSION['mensaje_exito'] = 'Producto agregado al carrito';
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


            // Actualizar el campo "compra_id" en la tabla "Carritos" con el ID de la compra asociada
            $actualizarCarrito = $this->pdo->prepare("UPDATE Carritos SET compra_id = ?, estado_id = 2 WHERE usuario = ? AND estado_id = 1");
            $actualizarCarrito->execute([$compra_id, $usuario_id]);

            // Confirmar la transacción
            $this->pdo->commit();

            return $compra_id;
        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            $this->pdo->rollBack();
            throw $e;
        }
    }


    public function obtenerDetallesCompra()
    {
        $obtenerDetalles = $this->pdo->query("SELECT dc.id as id_compra, dc.usuario_id, u.nombre as nombre_cliente, u.apellido as apellido_cliente, dc.fecha_pedido, dc.total, dc.estado_id
                                              FROM DetalleCompra dc
                                              INNER JOIN Usuarios u ON dc.usuario_id = u.id
                                              GROUP BY dc.id, dc.usuario_id, u.nombre, u.apellido, dc.fecha_pedido, dc.total, dc.estado_id
                                              ORDER BY dc.fecha_pedido DESC");

        $detallesCompras = $obtenerDetalles->fetchAll(\PDO::FETCH_ASSOC);

        // Ahora, para cada compra, obtendremos los productos asociados
        foreach ($detallesCompras as &$detalleCompra) {
            $obtenerProductos = $this->pdo->query("SELECT p.nombre as nombre_producto, c.cantidad, c.total as precio
                                                   FROM Carritos c
                                                   INNER JOIN Productos p ON c.producto_id = p.sku
                                                   WHERE c.compra_id = " . $detalleCompra['id_compra']);
            $productos = $obtenerProductos->fetchAll(\PDO::FETCH_ASSOC);

            $detalleCompra['productos'] = $productos;
        }

        return $detallesCompras;
    }


    // Función para cambiar el estado de una compra a "Finalizado" (3)
    public function confirmarCompra($compra_id, $usuario_id)
    {
        // Actualizar el estado de la compra a "Finalizado" (3) en la tabla DetalleCompra
        $actualizarEstadoCompra = $this->pdo->prepare("UPDATE DetalleCompra SET estado_id = 3 WHERE id = ?");
        $actualizarEstadoCompra->execute([$compra_id]);

        // Actualizar el estado del carrito a "Confirmado" (3) en la tabla Carritos
        $actualizarEstadoCarrito = $this->pdo->prepare("UPDATE Carritos SET estado_id = 3 WHERE id = ? AND usuario = ?");
        $actualizarEstadoCarrito->execute([$compra_id, $usuario_id]);

        // Obtener los productos asociados al carrito confirmado
        $obtenerProductos = $this->pdo->prepare("SELECT producto_id, cantidad FROM Carritos WHERE compra_id = ? AND usuario = ?");
        $obtenerProductos->execute([$compra_id, $usuario_id]);
        $productos = $obtenerProductos->fetchAll(\PDO::FETCH_ASSOC);

        // Reducir el stock de los productos confirmados
        foreach ($productos as $producto) {
            $producto_id = $producto['producto_id'];
            $cantidad_confirmada = $producto['cantidad'];

            // Obtener el stock actual del producto
            $obtenerStock = $this->pdo->prepare("SELECT stock FROM Productos WHERE sku = ?");
            $obtenerStock->execute([$producto_id]);
            $stock_actual = $obtenerStock->fetchColumn();

            // Calcular el nuevo stock después de confirmar la compra
            $nuevo_stock = $stock_actual - $cantidad_confirmada;

            // Actualizar el stock del producto en la tabla Productos
            $actualizarStock = $this->pdo->prepare("UPDATE Productos SET stock = ? WHERE sku = ?");
            $actualizarStock->execute([$nuevo_stock, $producto_id]);
        }
    }

    public function cancelarCompra($compra_id, $usuario_id)
    {
        // Actualizar el estado de la compra a "Cancelado" (4) en la tabla DetalleCompra
        $actualizarEstadoCompra = $this->pdo->prepare("UPDATE DetalleCompra SET estado_id = 4 WHERE id = ?");
        $actualizarEstadoCompra->execute([$compra_id]);

        // Actualizar el estado del carrito a "Cancelado" (4) en la tabla Carritos
        $actualizarEstadoCarrito = $this->pdo->prepare("UPDATE Carritos SET estado_id = 4 WHERE id = ? AND usuario = ?");
        $actualizarEstadoCarrito->execute([$compra_id, $usuario_id]);
    }

public function obtenerDetallesCompraPorUsuario($usuario_id)
{
    $obtenerDetalles = $this->pdo->query("SELECT dc.id AS id_compra, dc.usuario_id, u.nombre AS nombre_cliente, u.apellido AS apellido_cliente, dc.fecha_pedido, dc.total, e.estado
                                          FROM DetalleCompra dc
                                          INNER JOIN Usuarios u ON dc.usuario_id = u.id
                                          INNER JOIN estado e ON dc.estado_id = e.id
                                          WHERE dc.usuario_id = $usuario_id
                                          GROUP BY dc.id, dc.usuario_id, u.nombre, u.apellido, dc.fecha_pedido, dc.total, dc.estado_id
                                          ORDER BY dc.fecha_pedido DESC");

    $detallesCompras = $obtenerDetalles->fetchAll(\PDO::FETCH_ASSOC);

    // Ahora, para cada compra, obtendremos los productos asociados
    foreach ($detallesCompras as &$detalleCompra) {
        $obtenerProductos = $this->pdo->query("SELECT p.sku, p.nombre AS nombre_producto, p.descripcion, p.precio, c.cantidad, c.total AS total_producto, i.IMAGEN AS imagen_ruta, c.total
        FROM Carritos c
        INNER JOIN Productos p ON c.producto_id = p.sku
        INNER JOIN Imagenes i ON p.imagen = i.id_img
        WHERE c.compra_id = " . $detalleCompra['id_compra']);

        $productos = $obtenerProductos->fetchAll(\PDO::FETCH_ASSOC);

        $detalleCompra['productos'] = $productos;
    }

    return $detallesCompras;
}

public function buscarApartadosPorUsuario($usuario_id, $searchTerm)
{
    $query = "SELECT dc.id AS id_compra, dc.usuario_id, u.nombre AS nombre_cliente, u.apellido AS apellido_cliente, dc.fecha_pedido, dc.total, e.estado
              FROM DetalleCompra dc
              INNER JOIN Usuarios u ON dc.usuario_id = u.id
              INNER JOIN estado e ON dc.estado_id = e.id
              WHERE dc.usuario_id = :usuario_id AND CAST(dc.id AS CHAR) LIKE :search_term
              GROUP BY dc.id, dc.usuario_id, u.nombre, u.apellido, dc.fecha_pedido, dc.total, dc.estado_id
              ORDER BY dc.fecha_pedido DESC";

    $buscarDetalles = $this->pdo->prepare($query);
    $buscarDetalles->bindParam(':usuario_id', $usuario_id, \PDO::PARAM_INT);
    $search_term_with_wildcards = '%' . $searchTerm . '%';
    $buscarDetalles->bindParam(':search_term', $search_term_with_wildcards, \PDO::PARAM_STR);
    $buscarDetalles->execute();

    $detallesCompras = $buscarDetalles->fetchAll(\PDO::FETCH_ASSOC);

    // Ahora, para cada compra, obtendremos los productos asociados
    foreach ($detallesCompras as &$detalleCompra) {
        $obtenerProductos = $this->pdo->prepare("SELECT p.sku, p.nombre AS nombre_producto, p.descripcion, p.precio, c.cantidad, c.total AS total_producto, i.IMAGEN AS imagen_ruta, c.total
            FROM Carritos c
            INNER JOIN Productos p ON c.producto_id = p.sku
            INNER JOIN Imagenes i ON p.imagen = i.id_img
            WHERE c.compra_id = :compra_id");
        $obtenerProductos->bindParam(':compra_id', $detalleCompra['id_compra'], \PDO::PARAM_INT);
        $obtenerProductos->execute();

        $productos = $obtenerProductos->fetchAll(\PDO::FETCH_ASSOC);

        $detalleCompra['productos'] = $productos;
    }

    return $detallesCompras;
}




public function buscarCompras($searchTerm)
{
    $obtenerDetalles = $this->pdo->query("SELECT dc.id as id_compra, dc.usuario_id, u.nombre as nombre_cliente, u.apellido as apellido_cliente, dc.fecha_pedido, dc.total, dc.estado_id
                                          FROM DetalleCompra dc
                                          INNER JOIN Usuarios u ON dc.usuario_id = u.id
                                          WHERE dc.id LIKE '%$searchTerm%'
                                          OR u.nombre LIKE '%$searchTerm%'
                                          OR u.apellido LIKE '%$searchTerm%'
                                          GROUP BY dc.id, dc.usuario_id, u.nombre, u.apellido, dc.fecha_pedido, dc.total, dc.estado_id
                                          ORDER BY dc.fecha_pedido DESC");

    $detallesCompras = $obtenerDetalles->fetchAll(\PDO::FETCH_ASSOC);

    // Ahora, para cada compra, obtendremos los productos asociados
    foreach ($detallesCompras as &$detalleCompra) {
        $obtenerProductos = $this->pdo->query("SELECT p.nombre as nombre_producto, c.cantidad, c.total as precio
                                               FROM Carritos c
                                               INNER JOIN Productos p ON c.producto_id = p.sku
                                               WHERE c.compra_id = " . $detalleCompra['id_compra']);
        $productos = $obtenerProductos->fetchAll(\PDO::FETCH_ASSOC);

        $detalleCompra['productos'] = $productos;
    }

    return $detallesCompras;
}





    public function __destruct()
    {
        $this->pdo = null; // Cierra la conexión establecida
    }
}
