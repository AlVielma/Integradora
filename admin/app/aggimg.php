<?php
session_start();
require __DIR__.'/../../vendor/autoload.php';
use App\Modelos\productos;
use App\Modelos\validacionproductos;
require_once __DIR__.'/../../src/modelos/productos.php';
require_once __DIR__.'/../../src/modelos/validacionproductos.php';
$productos = new productos();

$marcas= $productos->mostrar_marca();
$categorias= $productos->mostrar_categorias();
$tlente = $productos->mostrar_tipo_lentes();

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id']) || $_SESSION['user_rol'] != 1) {
  // Si el usuario no ha iniciado sesión o no tiene rol de admin, redirigir al index (página de usuario)
  header("Location: ../../pages/login.php");
  exit;
}
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
if(!empty($busqueda))
{
  $busqueda = $busqueda.'%';
  $mostrar=$productos->buscarproducto($busqueda);
}
elseif(isset($_GET['Reiniciar']))
{
  $busqueda="";
  $mostrar=$productos->mostrar_productos();
}
else{
  $mostrar=$productos->mostrar_productos();
}
$validacion = new validacionproductos();
$errors = [];
extract($_POST);
extract($_FILES);
$erroresedit = isset($_GET['errores']) ? json_decode($_GET['errores'], true) : [];
if (isset($_POST['agregar'])) {
    $nombres = $validacion->filtrarString($nombre);
    $descripcions = $validacion->filtrarString($descripcion);
    if ($validacion->nulo([$nombre, $categoria, $marca, $tipo_lente, $descripcion, $precio, $stock])) {
        $errors[] = "Los campos deben estar llenos";
    }
    if (empty($_FILES['imagen']['name'])) {
        $errors[] = "Debes seleccionar una imagen";
    }
    if(!$validacion->issnumber($precio))
    {
        $errors[]="El precio debe ser numerico";
    }
    if(!$validacion->issnumber($stock))
    {
        $errors[]="El stock debe ser numerico";
    }

    if (isset($_FILES['imagen']) && is_array($_FILES['imagen'])) {
        // Llamamos a la función validarExtensionImagen solo si hay información válida en $_FILES['imagen']
        if (!$validacion->validarExtensionImagen($_FILES['imagen'])) {
            $errors[] = "Solo se permiten imágenes con extensiones .jpg, .png y .jpeg";
        }
    }

    if (count($errors) == 0) {
      if ($nombres === $nombre && $descripcions === $descripcion) {
        $dir = __DIR__ . '/../../productosimg/';
        $pathinfo = pathinfo($_FILES['imagen']['name']);
        $filename = $pathinfo["filename"];
        $extension = $pathinfo["extension"];
        $name = time() . ".{$extension}"; // Aquí agregamos el timestamp actual al nombre del archivo
        $real_path = "{$dir}{$name}";
        move_uploaded_file($_FILES['imagen']['tmp_name'], $real_path);
        $productos->agregar_imagen($name);
        $imagenid = $productos->get_lastid();
        $productos->agregar_producto($nombres, $marca, $tipo_lente, $descripcions, $imagenid, $precio, $stock, $categoria);
        header('Location: aggimg.php');
        exit;
      }
      else{
        $errors[] = "Hubo un problema con los datos ingresados.";
      }
     
     
  }
}

/*
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id']) || $_SESSION['user_rol'] != 1) {
  // Si el usuario no ha iniciado sesión o no tiene rol de admin, redirigir al index (página de usuario)
  header("Location: ../../pages/login.php");
  exit;

 
}*/

?>

<!DOCTYPE html>
<html>
<head>
  <title>Agregar Producto.</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="/admin/css/produc.css">
</head>
<body>
  <!--Sidebar-->
<?php include 'sidebar.php';
?>
<br>

  <div class="container-fluid" id="content">
    <div>
    <?php
    
    if (is_array($erroresedit) && count($erroresedit) > 0) {
        $validacion->mensajes($erroresedit);
    }
    ?>
    </div>
    <div>
    <?php
            
            $validacion->mensajes($errors);
            ?>
    </div>

    <div class="">
      <h1>Agregar Producto</h1>
      <form method="get" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="busqueda" placeholder="Buscar producto" value="">
                <button class="btn btn btn-outline-secondary" type="submit">Buscar</button>
                <button class="btn btn btn-outline-secondary" name="Reiniciar" type="submit">Reiniciar</button>
            </div>
    </form>
    </div>

    <!-- Button trigger modal -->
    <a href="../../http/modalproducto.php" type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalproducto">
        Agregar
    </a>
    
    <h2>Productos</h2>

    <!-- Tabla de productos -->
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Categoría</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Imagen</th>
              <th>Activo/inactivo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach($mostrar as $product)
            {
            ?>
              <tr>
                <td><?php echo $product['nombre']; ?></td>
                <td><?php echo $product['descripcion']; ?></td>
                <td><?php echo $product['categoria']; ?></td>
                <td><?php echo '$'.$product['precio']; ?></td>
                <td><?php echo $product['stock']; ?></td>
                <td>
                  <img src="<?php echo '/../../productosimg/'.$product['IMAGEN']; ?>" alt="Imagen del producto" width="100px" height="100px">
                </td>
                <td>
                <?php if ($product['estado_id']==5) {
                  echo "<b style='color: green;'>Activo</b>";
                }
                elseif($product['estado_id']==1){
                  echo "<b style='color: red;'>Inactivo</b>";
                }?>
                </td>
                
                <td>
                  <a href="../../src/http/editproducto.php?sku=<?php echo $product['sku']; ?>" class="btn btn-warning">
                    <img src="../../images/editar.png" alt="">
                  </a>

                  <a class="btn btn-danger"data-bs-toggle="modal" data-bs-id="<?=$product['sku'];?>" data-bs-target="#modaleliminarproducto" ><img src="../../images/circulo-x.png" alt="">
                  </a>

                  <a class="btn btn-success" data-bs-toggle="modal" data-bs-id="<?=$product['sku'];?>" data-bs-target="#modalactivarproducto" ><img src="../../images/controlar.png" alt=""></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
  </div>
  
  <!--MODALAGREGAR-->
  <div class="modal fade" id="modalproducto" tabindex="-1" aria-labelledby="modalproudcto" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <div class="modal-header">
         
            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            
          </div>

          <div class="modal-body">
           
            <form action="aggimg.php" method="post" enctype="multipart/form-data" >
              <div class="mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" requireda>
              </div>
              <div class="mb-3">
                <label for="marca">Marca</label>
                <select class="form-control" name="marca" requireda>
                  <option value="">Marcas</option>
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
                <select class="form-control" name="tipo_lente" requireda>
                  <option value="">Tipo de lentes</option>
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
                <textarea class="form-control" name="descripcion" rows="3" requireda></textarea>
              </div>
              <div class="mb-3">
                <label for="categoria">Categoría</label>
                <select class="form-control" name="categoria" requireda>
                 <option value="">Categorías</option>
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
                <input type="number" class="form-control" name="precio" requireda>
              </div>
              <div class="mb-3">
                <label for="imagen">Agregar Imagen</label>
                <input type="file" class="form-control" name="imagen" accept=".jpg, .png, .jpeg">
              </div>
              <div class="mb-3">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" name="stock" requireda>
              </div>
              <button type="submit" class="btn btn-primary" name="agregar">Guardar</button>
            </form>
            <?php
            $validacion->mensajes($errors);
            ?>
          </div>
        </div>
      </div>
    </div>
    <!--/MODALAGREGAR-->
  <?php
  require __DIR__.'/../../src/http/modaleliminarproducto.php';
  require __DIR__.'/../../src/http/modalactivarproducto.php';
  ?>
  <button class="collapse-button hidden" id="collapseButton"><i class="fas fa-bars"></i></button>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/admin/js/boton.js"></script>
  <script src="/admin/js/modalcrudeliminar.js"></script>
  <script src="/admin/js/modalactivar.js"></script>

</body>

</html>