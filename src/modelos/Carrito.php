<?php
namespace App\Modelos;

use App\Modelos\Conexion;

class Carrito{
    private $conexion;
    private $pdo;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->pdo = $this->conexion->conectar();
    }

    public function agregarProducto($usuarioId, $productoId, $cantidad){
        //Verificamos si el producto ya existe en el carrito del usuario
        $consultaCarrito = $this->pdo->prepare("SELECT * FROM Carritos where usuario=? AND producto_id=?");
        $consultaCarrito->execute([$usuarioId, $productoId]);
        $productoEnCarrito = $consultaCarrito->fetch(\PDO::FETCH_ASSOC);

        if($productoEnCarrito){
            //Si el producto ya existe en el carrito, actualizamos la cantidad
            $nuevaCantidad = $productoEnCarrito['cantidad'] + $cantidad;
            $actualizarCarrito = $this->pdo->prepare("UPDATE Carritos cantidad=? WHERE id=?");
            $actualizarCarrito ->execute([$nuevaCantidad, $productoEnCarrito['id']]);
        }
        else{
            $agregarCarrito = $this ->pdo-> prepare("INSERT INTO Carritos (usuario, producto_id, cantidad, fecha_pedido, total) VALUES (?,?,?, NOW(), 0)");
            $agregarCarrito->execute([$usuarioId,$productoId,$cantidad]);
        }
    }

    public function obtenerProductosDelCarrito($usuarioId)
    {
        $consultaCarrito = $this->pdo->prepare("SELECT c.id, p.sku, p.nombre, p.descripcion, p.precio, p.imagen, c.cantidad FROM Carritos c INNER JOIN Productos p ON c.producto_id = p.sku WHERE c.usuario = ?");
        $consultaCarrito->execute([$usuarioId]);
        return $consultaCarrito->fetchAll(\PDO::FETCH_ASSOC);
    }

    
}
?>