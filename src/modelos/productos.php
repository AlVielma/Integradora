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
    public function consultaeedit($id)
    {
        $consultaedit = $this->pdo->prepare("SELECT p.sku,p.nombre,p.marca_id,tipo_lente_id,p.descripcion,p.imagen,p.precio,p.stock,p.categoria_id,i.IMAGEN
        from Productos p inner join Imagenes i on p.imagen = i.id_img where sku=?");
        $consultaedit->execute([$id]);
        return $obtconsulta =$consultaedit->fetchAll(\PDO::FETCH_ASSOC);

    }
    public function mostrar_productos()
    {
        $mostarproductos = $this->pdo->query("SELECT p.sku, p.nombre, p.descripcion, c.nombre AS categoria, p.precio, p.stock, i.IMAGEN
        FROM Categorias c INNER JOIN Productos p ON p.categoria_id = c.id INNER JOIN Imagenes i
        ON p.imagen = id_img");
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

    public function actualizarproducto($nombre, $marca_id,$tipo_lente_id,$descripcion,$precio,$stock,$categoria_id,$id)
    {
        $actualizar = $this->pdo->prepare ("UPDATE Productos SET nombre=?, marca_id=?, tipo_lente_id=?, descripcion=?, precio=?, stock=?, categoria_id=?
        WHERE sku=?");
        $actualizar->execute([$nombre, $marca_id,$tipo_lente_id,$descripcion,$precio,$stock,$categoria_id,$id]);
    }

    public function actualizarimg($nombre,$id)
    {
        $actualizar = $this->pdo->prepare ("UPDATE Imagenes SET IMAGEN=? WHERE id_img=?");
        $actualizar->execute([$nombre,$id]);
    }
    
    public function imagenactual($id)
    {
        $imgactual =$this->pdo->prepare("SELECT IMAGEN FROM Imagenes WHERE id_img=?");
        $imgactual->execute([$id]);
        return $imgactuall->fetchColumn();
    }
}
