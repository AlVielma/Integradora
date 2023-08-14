<?php
namespace App\Modelos;
require_once 'Conexion.php';
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
        $mostarproductos = $this->pdo->query("SELECT p.sku, p.nombre, p.descripcion, c.nombre AS categoria, p.precio, p.stock, i.IMAGEN,p.estado_id
        FROM Categorias c INNER JOIN Productos p ON p.categoria_id = c.id INNER JOIN Imagenes i
        ON p.imagen = i.id_img order by sku DESC");
        return $mostarproductos->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function mostrar_categorias()
    {
        $mostrarcategorias = $this->pdo->query("SELECT*FROM Categorias");
        return $mostrarcategorias->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function agregar_producto($nombre,$marca_id,$tipo_lente_id,$descripcion,$imagen,$precio,$stock,$categoria_id)
    {
        $aggproducto = $this->pdo->prepare("INSERT INTO Productos(nombre,marca_id,tipo_lente_id,descripcion,imagen,precio,stock,categoria_id,estado_id)
         VALUES (?,?,?,?,?,?,?,?,1)");
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


    public function eliminarproducto($id)
    {
      
        $eliminarprodu = $this->pdo->prepare("UPDATE Productos SET estado_id = 1 WHERE sku=?");
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
        return $imgactual->fetchColumn();
    }

    public function masvendidos3()
    {
        $masvendidos3 = $this->pdo->query("SELECT p.sku, p.nombre,p.precio,i.IMAGEN FROM Productos p INNER JOIN Imagenes i on 
        p.imagen = i.id_img WHERE p.estado_id=5 ORDER BY p.stock ASC LIMIT 3");

        return $masvendidos3->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function descproducto($id)
    {
        $descproducto = $this->pdo->prepare("SELECT p.sku,p.nombre,p.descripcion, p.precio, m.nombre as Marca, i.IMAGEN,tp.tipo_lente, stock
        FROM Imagenes i INNER JOIN Productos p on i.id_img = p.imagen INNER JOIN
        Marcas m on m.id = p.marca_id INNER JOIN TiposLentes tp on tp.id=p.tipo_lente_id WHERE p.sku=? LIMIT 1");
        $descproducto->execute([$id]);
        return $descproducto->fetch(\PDO::FETCH_ASSOC);
    }
    public function recomendados($id)
    {
        $recomendados = $this->pdo->prepare("SELECT p.sku, p.nombre,p.precio,i.IMAGEN FROM Productos p INNER JOIN Imagenes i on 
        p.imagen = i.id_img WHERE p.sku<>? and p.estado_id=5 ORDER BY RAND() ASC LIMIT 8");
        $recomendados->execute([$id]);
        return $recomendados->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function pophombres()
    {
        $pophombres = $this->pdo->prepare("SELECT p.sku,p.nombre,p.precio,i.IMAGEN
        FROM Productos p INNER JOIN Imagenes i on p.imagen = i.id_img WHERE p.categoria_id=1 and p.estado_id=5");
        $pophombres->execute();
        return $pophombres->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function popmujer()
    {
        $popmujer = $this->pdo->prepare("SELECT p.sku,p.nombre,p.precio,i.IMAGEN
        FROM Productos p INNER JOIN Imagenes i on p.imagen = i.id_img WHERE p.categoria_id=2 and p.estado_id=5");
        $popmujer->execute();
        return $popmujer->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function popniño()
    {
        $popniño = $this->pdo->prepare("SELECT p.sku,p.nombre,p.precio,i.IMAGEN
        FROM Productos p INNER JOIN Imagenes i on p.imagen = i.id_img WHERE p.categoria_id=3 and p.estado_id=5");
        $popniño->execute();
        return $popniño->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function popniña()
    {
        $pophombres = $this->pdo->prepare("SELECT p.sku,p.nombre,p.precio,i.IMAGEN
        FROM Productos p INNER JOIN Imagenes i on p.imagen = i.id_img WHERE p.categoria_id=4 and p.estado_id=5");
        $pophombres->execute();
        return $pophombres->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function solarhombre()
    {
        $pophombres = $this->pdo->prepare("SELECT p.sku,p.nombre,p.precio,i.IMAGEN
        FROM Productos p INNER JOIN Imagenes i on p.imagen = i.id_img WHERE p.categoria_id=5 and p.estado_id=5");
        $pophombres->execute();
        return $pophombres->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function solarmujer()
    {
        $pophombres = $this->pdo->prepare("SELECT p.sku,p.nombre,p.precio,i.IMAGEN
        FROM Productos p INNER JOIN Imagenes i on p.imagen = i.id_img WHERE p.categoria_id=6 and p.estado_id=5");
        $pophombres->execute();
        return $pophombres->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Función para obtener productos recomendados generales (sin necesidad de ID específico)
    public function productosRecomendadosGenerales($cantidad = 8)
    {
        $recomendados = $this->pdo->prepare("SELECT p.sku, p.nombre, p.precio, i.IMAGEN 
            FROM Productos p 
            INNER JOIN Imagenes i ON p.imagen = i.id_img 
            WHERE p.estado_id=5
            ORDER BY RAND() 
            LIMIT ?");
        $recomendados->execute([$cantidad]);
        return $recomendados->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function activarproducto($id)
    {
        $activar = $this->pdo->prepare("UPDATE Productos SET estado_id = 5 WHERE sku=?");
        $activar->execute([$id]);
    }

    public function buscarproducto($nombre)
    {
        $buscacrud = $this->pdo->prepare("SELECT p.sku, p.nombre, p.descripcion, c.nombre AS categoria, p.precio, p.stock, i.IMAGEN,p.estado_id
        FROM Categorias c INNER JOIN Productos p ON p.categoria_id = c.id INNER JOIN Imagenes i
        ON p.imagen = i.id_img WHERE p.nombre LIKE ?");
        $buscacrud->execute([$nombre]);
        return $buscacrud->fetchAll(\PDO::FETCH_ASSOC);
    }


public function __destruct()
    {
        $this->pdo = null; // Cierra la conexión establecida
    }
}
