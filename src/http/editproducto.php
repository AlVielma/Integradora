<?php
require __DIR__.'/../../vendor/autoload.php';
use App\Modelos\productos;
use App\Modelos\validacionproductos;
use App\Modelos\Conexion;
$conexion = new Conexion();
$conect= $conexion->conectar();
$productos = new productos();
$mostrar=$productos->mostrar_productos();
$marcas= $productos->mostrar_marca();
$categorias= $productos->mostrar_categorias();
$tlente = $productos->mostrar_tipo_lentes();
$validacion = new validacionproductos();
$id = $_GET['sku'];
$query = $conect->prepare("SELECT p.sku,p.nombre,p.marca_id,tipo_lente_id,p.descripcion,p.imagen,p.precio,p.stock,p.categoria_id,i.IMAGEN
from Productos p inner join Imagenes i on p.imagen = i.id_img where sku=?");
$query->execute([$id]);
$conss = $query->fetch(PDO::FETCH_ASSOC);

?>

<?php
 extract($_POST);
 extract($_FILES);
if(isset($_POST['editar']))
{

   
    $dir = __DIR__.'/../../productosimg/';
    $pathinfo = pathinfo($imagen['name']);
    $filename = $pathinfo["filename"];
    $extension = $pathinfo["extension"];
    $name= "{$filename}.{$extension}";
    $real_path = "{$dir}{$filename}.{$extension}";

    if (!file_exists($real_path))
    {
        $imagenactual = $productos->imagenactual($id);
        if (!empty($imagenactual) && file_exists(__DIR__ . "/../../productosimg/" . $imagenactual)) {
            unlink(__DIR__ . "/../../productosimg/" . $imagenactual);
        }
        move_uploaded_file($imagen['tmp_name'], $real_path);
        $productos->actualizarproducto($nombre, $marca, $tipo_lente, $descripcion, $precio, $stock, $categoria, $id);
        $productos->actualizarimg($name, $id);
        header('Location: /../../admin/app/aggimg.php');
    }
    else {
        $productos->actualizarproducto($nombre, $marca, $tipo_lente, $descripcion, $precio, $stock, $categoria, $id);
        header('Location: /../../admin/app/aggimg.php');
    }
   
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

<div class="container container form border border-black p-4">
  <form action="editproducto.php" method="post" enctype="multipart/form-data" >
    <?php
    
    ?>
  <legend>Editar producto</legend>
            <input type="hidden" value="<?php echo $conss['sku']; ?>" name="id">
              <div class="mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $conss['nombre']; ?>">
              </div>
              <div class="mb-3">
                <label for="marca">Marca</label>
                <select class="form-control" name="marca" value="<?php echo $conss['marca_id']; ?>">
                  <option value="<?php echo $conss['marca_id']; ?>">Marcas</option>
                  <?php
                  foreach ($marcas as $marc) {
                  ?>
                      <option value="<?php echo $marc['id']; ?>">
                          <?php echo $marc['nombre']; ?>
                      </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="tipo">Tipo de lente</label>
                <select class="form-control" name="tipo_lente" value="<?php echo $conss['tipo_lente_id']; ?>">
                  <option value="<?php echo $conss['tipo_lente_id']; ?>">Tipo de lentes</option>
                  <?php
                  foreach ($tlente as $tlente) {
                  ?>
                      <option value="<?php echo $tlente['id']; ?>">
                          <?php echo $tlente['tipo_lente']; ?>
                      </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="descripcion">Descripción</label>
                <input class="form-control" name="descripcion" rows="3" value="<?php echo $conss['descripcion']; ?>"></input>
              </div>
              <div class="mb-3">
                <label for="categoria">Categoría</label>
                <select class="form-control" name="categoria" value="<?php echo $conss['categoria_id']; ?>">
                 <option value="<?php echo $conss['categoria_id']; ?>">Categorías</option>
                  <?php
                  foreach ($categorias as $cat) {
                  ?>
                      <option value="<?php echo $cat['id']; ?>">
                          <?php echo $cat['nombre']; ?>
                      </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" name="precio" value="<?php echo $conss['precio']; ?>" >
              </div>
              <div class="mb-3">
                <label for="imagen">Agregar Imagen</label>
                <input type="file" class="form-control" name="imagen" value="<?php echo $conss['IMAGEN']; ?>">
              </div>
              <div class="mb-3">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" name="stock" value="<?php echo $conss['stock']; ?>">
              </div>
              <div class="text-center">
              <button type="submit" class="btn btn-primary" name="editar">Guardar</button>
                    
              </div>
             
            </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>

