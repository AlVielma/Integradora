<?php
namespace App\Modelos;
use App\Modelos\Conexion;
require __DIR__.'/../../vendor/autoload.php';
Class productos
{
    private $conexion;
    private $pdo;

    public function __construct() 
    {
        $this->conexion = new Conexion();
        $this->pdo = $this->conexion->conectar();
    }

    public function mostrar_productos()
    {
        $mostarproductos = $this->pdo->query("SELECT p.nombre,p.descripcion,c.nombre as categoria ,p.precio,p.stock FROM Productos p inner join Categorias c ON p.sku=c.id");
    }

    public function mostrar_categorias()
    {
        $mostrarcategorias = $this->pdo->query("SELECT*FROM Categorias");
    }

    public function agregar_producto($nombre,$marca_id,$tipo_lente_id,$descripcion,$imagen,$precio,$stock,$categoria_id)
    {
        $aggproducto = $this->conexion->prepare("INSERT INTO Productos(nombre,marca_id,tipo_lente_id,descripcion,imagen,precio,stock,categoria_id)
         VALUES (?,?,?,?,?,?,?,?)");
        $aggproducto->execute([$nombre,$marca_id,$tipo_lente_id,$descripcion,$imagen,$precio,$stock,$categoria_id]);

    }

    public function get_lastid()
    {
        return $this->pdo->lastInsertId();
    }
}
