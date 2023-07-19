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
        $mostarproductos = $this->pdo->query("SELECT p.sku,p.nombre,p.descripcion,c.nombre as categoria ,p.precio,p.stock,i.IMAGEN FROM 
        Categorias c inner join Productos p ON p.sku=c.id INNER JOIN Imagenes i ON p.imagen = i.id_img");
        return $mostarproductos->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function mostrar_categorias()
    {
        $mostrarcategorias = $this->pdo->query("SELECT*FROM Categorias");
        return $mostrarcategorias->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function agregar_producto($nombre,$marca_id,$tipo_lente_id,$descripcion,$imagen,$precio,$stock,$categoria_id)
    {
        $aggproducto = $this->pdo->prepare("INSERT INTO Productos(nombre,marca_id,tipo_lente_id,descripcion,imagen,precio,stock,categoria_id)
         VALUES (?,?,?,?,?,?,?,?)");
        $aggproducto->execute([$nombre,$marca_id,$tipo_lente_id,$descripcion,$imagen,$precio,$stock,$categoria_id]);

    }

    public function agregar_imagen($imagen)
    {
        $aggimg = $this->pdo->prepare("INSERT INTO Imagenes(IMAGEN) VALUES (?)");
        $aggimg->execute([$imagen]);
    }
    
    public function mostrar_marca()
    {
        $mostrarmarca = $this->pdo->query("SELECT * FROM Marcas");
        return $mostrarmarca->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function mostrar_tipo_lentes()
    {
        $mostrartipolente = $this->pdo->query("SELECT * FROM TiposLentes");
        return $mostrartipolente->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function get_lastid()
    {
        return $this->pdo->lastInsertId();
    }


    public function eliminarimg($id)
    {
        $eliminarimg = $this->pdo->prepare("DELETE FROM Imagenes WHERE id_img=?");
        $eliminarimg->execute([$id]);
    }


    public function eliminarproducto($id)
    {
        $obtenerimg = $this->pdo->prepare("SELECT IMAGEN FROM Imagenes WHERE id_img=?");
        $obtenerimg->execute([$id]);
        $imagenData = $obtenerimg->fetch(\PDO::FETCH_ASSOC);
    
        if ($imagenData && isset($imagenData['IMAGEN'])) {
            $imagen = $imagenData['IMAGEN'];
            $rutaImagen = __DIR__ . "/../../productosimg/" . $imagen;
    
           
            if (file_exists($rutaImagen)) {
                unlink($rutaImagen);
            }
        }
        $eliminarprodu = $this->pdo->prepare("DELETE FROM Productos WHERE sku=?");
        $eliminarprodu->execute([$id]);
    }

    public function actualizarproducto($nombre,$marca_id,$tipo_lente_id,$descripcion,$precio,$stock,$categoria_id,$id)
    {
        $actualizarpro = $this->pdo->prepare("UPDATE FROM Productos SET nombre=?,marca_id=?,tipo_lente_id=?,descripcion=?,precio=?,stock=?,categoria_id=? WHERE sku=?");
        $actualizarpro->execute([$nombre,$marca_id,$tipo_lente_id,$descripcion,$precio,$stock,$categoria_id,$id]);
    }   

    public function actualizarimg($imagen,$id)
    {
        $actualizarimg = $this->pdo->preparare("UPDATE FROM Imagenes SET IMAGEN=? WHERE id_img=?");
        $actualizarimg->execute([$imagen,$id]);
    }

}
