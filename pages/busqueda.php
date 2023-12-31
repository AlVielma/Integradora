<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
use App\Modelos\Conexion;
require_once __DIR__.'/../src/modelos/Conexion.php';
$conexion = new Conexion();
$con = $conexion->conectar();

// Agregar la ruta base de las imágenes
$rutaBaseImagenes = '../productosimg/';

// Verificar si se ha enviado el formulario
if (isset($_POST['busqueda'])) {
  $busqueda = addslashes($_POST['busqueda']);

  // Obtener la opción de ordenamiento seleccionada
  $orden = isset($_POST['orden']) ? $_POST['orden'] : '';

  $consulta = $con->prepare("CALL BuscadorPro(?);");
  $consulta->execute([$busqueda]);

  $product = $consulta->fetchAll(PDO::FETCH_OBJ);
  // Cierra el cursor de la consulta anterior para liberar recursos
  $consulta->closeCursor();

  // Aplicar clasificación si es necesario
  if ($orden === 'mayor_menor') {
    usort($product, function ($a, $b) {
      return $b->precio - $a->precio;
    });
  } elseif ($orden === 'menor_mayor') {
    usort($product, function ($a, $b) {
      return $a->precio - $b->precio;
    });
  }

  // Guardar los resultados en la variable de sesión solo si se ha realizado una búsqueda o filtrado
  $_SESSION['productos'] = $product;
} elseif (isset($_SESSION['productos'])) {
  // Si no se ha enviado el formulario, cargar los productos desde la sesión
  $product = $_SESSION['productos'];
} else {
  // Si no hay resultados de búsqueda en la sesión ni se ha enviado el formulario, cargar todos los productos
  $consultaTodos = $con->prepare("SELECT * FROM Productos;");
  $consultaTodos->execute();
  $product = $consultaTodos->fetchAll(PDO::FETCH_OBJ);
  $consultaTodos->closeCursor();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <!--Css-->
    <link rel="stylesheet" href="/../css/index.css">
    <!--Icon-->
    <link rel="icon" href="/../images/icon.png">
    <title>Pop Ópticos</title>
</head>
<body>
    <!--Header-->
    <?php include 'header.php';
    ?>
        
             <!--Contenido Recomendados-->
             <div class="mt-3 container-fluid titulos-azul">
               <!-- Titulo -->
                <div class="row border border-3 border-secondary align-items-center p-2 mb-4">
                    <div class="col-md-8">
                    <h1 class="text-start text-black ms-5">BUSQUEDA</h1>
                    </div>
                    <!-- Filtrador -->
                        <div class="col-md-2 text-md-end">
                            <form id="sort-form" method="POST">
                                <input type="hidden" name="busqueda" value="<?php echo isset($_POST['busqueda']) ? htmlentities($_POST['busqueda']) : ''; ?>"> <!-- verifica si hay algun producto que ordenar y evita que el usuario ingrese código malicioso -->
                                <select name="orden" id="filter-category" class="form-select border border-black" onchange="submitForm()">
                                    <option value="">Filtrar por:</option>
                                    <option value="mayor_menor">Precio: Mayor a Menor</option>
                                    <option value="menor_mayor">Precio: Menor a Mayor</option>
                                </select>
                            </form>
                        </div>
                    <div class="col-md-2 ">
                        <h5 class=" text-black">Cantidad: <?php echo count($product); ?></h5>
                    </div>
                </div>
              <div class="row text-start">
                <?php
                  if (count($product) > 0) {
                      foreach ($product as $producto) {
                          echo '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">';
                          echo '<div class="card" style="width: 19rem;">';
                          echo '<a href="prodejem.php?id=' . $producto->sku. '"><img src="'. $rutaBaseImagenes . $producto->imagen .'" class="card-img-top" alt="Imagen del producto" width="200px" height="230px"></a>';
                          echo '<div class="card-body">';
                          echo '<h5 class="card-title h4">' . $producto->nombre . '</h5>';
                          echo '<a class="objeto-texto" href="prodejem.php?id=' . $producto->sku. '"><p class="card-text h5">' . $producto->precio . '</p></a>';
                          echo '</div>';
                          echo '</div>';
                          echo '</div>';
                      }
                  } else {
                      echo '<div class="col-sm-12">';
                      echo '<p class="h5">No se encontraron resultados.</p>';
                      echo '</div>';
                  }
                  ?>
               </div>
             </div>
            <!--footer-->
            <div class="container-fluid border border-black footer bg-dark text-white">

              <!--Footer superio-->
              <?php
           include 'footer.php';
           ?>
             
            </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="../admin/js/recar.js"></script>
    <script>
      history.replaceState(null,null,location.pathname);
    </script>
</body>
</html>