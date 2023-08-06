<?php
session_start();
use App\Modelos\productos;
require_once __DIR__.'/../src/modelos/productos.php';
require __DIR__.'/../vendor/autoload.php';

$productos = new productos();
$solarhombre= $productos->solarhombre();
$total = count($solarhombre);

// Obtener la opción de ordenamiento seleccionada
$orden = isset($_GET['orden']) ? $_GET['orden'] : '';

// Aplicar clasificación si es necesario
if ($orden === 'mayor_menor') {
    usort($solarhombre, function ($a, $b) {
        return $b['precio'] - $a['precio'];
    });
} elseif ($orden === 'menor_mayor') {
    usort($solarhombre, function ($a, $b) {
        return $a['precio'] - $b['precio'];
    });
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
            <!--banner-->
            <div id="carouselExample" class="carousel slide container-fluid">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/../images/banner1.jpg" class="d-block w-100" alt="..." height="height="900px">
                  </div>
                </div>
               
             </div>
          
             <!--Contenido Recomendados-->
             <div class="mt-3 container-fluid titulos-azul">
               <!-- Titulo -->
                <div class="row border border-3 border-secondary align-items-center p-2 mb-4">
                    <div class="col-md-8">
                    <h1 class="text-start text-black ms-5">Solar Hombre</h1>
                    </div>
                    <!-- Filtrador -->
                    <div class="col-md-2 text-md-end">
                            <form id="sort-form" method="GET">
                                <input type="hidden" name="busqueda" value="<?php echo isset($_GET['busqueda']) ? htmlentities($_GET['busqueda']) : ''; ?>"> <!-- verifica si hay algun producto que ordenar y evita que el usuario ingrese código malicioso -->
                                <select name="orden" id="filter-category" class="form-select border border-black" onchange="submitForm()">
                                    <option value="">Filtrar por:</option>
                                    <option value="mayor_menor">Precio: Mayor a Menor</option>
                                    <option value="menor_mayor">Precio: Menor a Mayor</option>
                                </select>
                            </form>
                        </div>
                    <div class="col-md-2 ">
                        <h5 class=" text-black">Cantidad:<?php echo $total; ?></h5>
                    </div>
                </div>

                <!--fila-->
                <div class="row text-start">
                  <!--lentes5-->
                  <?php
                    foreach($solarhombre as $solarh)
                    {
                  ?>
                  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
                    <div class="card" style="width: 19rem;">
                      <a href="prodejem.php?id=<?php echo $solarh['sku']; ?>">
                      <img src="<?php echo '/../productosimg/'.$solarh['IMAGEN']; ?>" class="card-img-top" alt="..."width="200px" height="230px"></a>
                      <div class="card-body">
                        <h5 class="card-title h4"><?php echo $solarh['nombre']; ?></h5>
                        <a class="objeto-texto" href="prodejem.php?id=<?php echo $solarh['sku']; ?>">
                        <p class="card-text h5">$<?php echo $solarh['precio']; ?>MXN</p></a>
                      </div>
                    </div>
                  </div>
                  <?php
                    }
                    ?>
                  <!--lentes6-->

               </div>
             </div>
            <!--footer-->
          <?php include 'footer.php';
          ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="../admin/js/recar.js"></script>

</body>
</html>