
<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__.'/../src/modelos/Carrito.php';
require_once __DIR__.'/../src/modelos/productos.php';

use App\Modelos\Carrito;
use App\Modelos\productos;

// Crear un objeto de la clase Carrito
$carritoModelo = new Carrito();
$productosModelo = new productos();

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['user_id'])) {
    // Obtener el ID del usuario actual desde la sesión
    $usuario_id = $_SESSION['user_id'];

    // Obtener los productos del carrito para el usuario actual desde la base de datos
    $productosCarrito = $carritoModelo->obtenerProductosCarrito($usuario_id);
} else {
    // El usuario no ha iniciado sesión o no tiene productos en el carrito
    $productosCarrito = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!--Css-->
  <link rel="stylesheet" href="../css/index.css">
  <!--Icon-->
  <link rel="icon" href="../images/icon.png">
  <title>Pop Ópticos</title>
</head>

<body>

  <!--Header-->
  <?php include 'header.php';
  ?>

  <!--Contenido-->
  
  <div class="container border border-black mt-4 mb-4">
    <?php
    if (empty($productosCarrito)) {
        // Mostrar mensaje de carrito vacío
        echo '<h2 class="text-center">El carrito está vacío.</h2>';
    } else {
        $total = 0;
        foreach ($productosCarrito as $producto) {
            // Obtener los detalles del producto desde la base de datos
            $productoDetalles = $productosModelo->consultaeedit($producto['sku']);
            if (!empty($productoDetalles)) {
                // Se asume que cada producto tiene solo una fila en la consulta
                $nombre = $productoDetalles[0]['nombre'];
                $precio = $productoDetalles[0]['precio'];
                $imagen = $productoDetalles[0]['IMAGEN'];
                $descripcion = $productoDetalles[0]['descripcion'];
              ?>
                <h2 class="text-center"><?php echo $nombre; ?></h2>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo '../productosimg/' . $imagen; ?>" alt="Imagen del producto" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <p class="lead font-weight-bold"><?php echo $descripcion; ?></p>
                        <p class="lead font-weight-bold">$<?php echo number_format($precio, 2); ?> MXN</p>
                        <p class="lead font-weight-bold">Pop Ópticos</p>
                        <!-- Resto del contenido del producto -->
                        <div class="row">
                            <div class="col-md-6">
                                <input type="number" class="form-control btn-sm border-dark" value="<?php echo $cantidad; ?>" placeholder="Cantidad:" style="width: 150px;">
                            </div>
                            <div class="col-md-6">
                                <form action="eliminar_producto.php" method="post">
                                    <input type="hidden" name="sku" value="<?php echo $producto['sku']; ?>">
                                    <button type="submit" class="btn btn-light btn-outline-dark">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 border-top border-5"></div>
    <?php
            }
        }
    }
    ?>
</div>


  <!--Contenido Recomendados-->

  <!--footer-->
  <?php
           include 'footer.php';
           ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>
