<?php
session_start();
require_once '../src/modelos/productos.php'; 
use App\Modelos\productos;
$productos = new productos();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
    <div class="card-body text-center mt-5 mb-5">
        <div class="mb-3">
            <h5 class="display-6 fw-bold">Tu carrito está vacío</h5>
        </div>
        <div class="mb-3">
            <a href="pophombres.php" class="btn btn-light btn-outline-dark">Seguir comprando</a>
        </div>
        <div class="mb-3 border-top border-5"></div>
    </div>
    

<!-- Contenido Recomendados -->
<div class="container-fluid titulos-azul mt-4 mb-4">
    <!-- Titulo azul -->
    <div class="row justify-text">
        <h4 class="text-center azul text-black">Recomendados</h4>
    </div>
    <!-- fila -->
    <div class="row text-start">
        <?php
        $recomendados = $productos->productosRecomendadosGenerales(8); // Obtiene 8 productos recomendados
        foreach ($recomendados as $reco) {
        ?>
            <!--lentes5-->
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 centrar">
                <div class="card" style="width: 19rem;">
                    <a href="prodejem.php?id=<?php echo $reco['sku']; ?>"><img src="<?php echo '/../productosimg/' . $reco['IMAGEN']; ?>" class="card-img-top" alt="..." width="200px" height="230px"></a>
                    <div class="card-body">
                        <h5 class="card-title h4"><?php echo $reco['nombre']; ?></h5>
                        <a class="objeto-texto" href="prodejem.php?id=<?php echo $reco['sku']; ?>">
                            <p class="card-text h5">$<?php echo $reco['precio']; ?> MXN</p>
                        </a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>


    <!--footer-->
    <?php
           include 'footer.php';
           ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
        crossorigin="anonymous"></script>
</body>

</html>