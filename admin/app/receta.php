<?php
use App\Modelos\Conexion;
use App\Modelos\ValidacionesReceta;
require __DIR__ . '/../../vendor/autoload.php';
session_start();
/*
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id']) || $_SESSION['user_rol'] != 1) {
  // Si el usuario no ha iniciado sesión o no tiene rol de admin, redirigir al index (página de usuario)
  header("Location: ../../pages/login.php");
  exit;
}*/

$success = false;
$errorMessages = [];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="/admin/css/recet.css">
  <title>Receta</title>
</head>
<body>
  
<!--Sidebar-->
<?php include 'sidebar.php';
?>

  <div class="container-fluid" id="content">
    <!-- Modal -->
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="recetaModalLabel">Receta</h5>
          </div>
          <div class="modal-body">
            <form action="recetapdf.php" method="POST">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="nombre">Nombre del paciente:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
      
                <div class="mb-3">
                  <label for="edad">Edad:</label>
                  <input type="text" class="form-control" id="edad" name="edad" required>
                </div>
      
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="tratamiento">Tratamiento: <span id="tratamientoValue"></span></label>
                      <textarea class="form-control" id="tratamiento" name="tratamiento" rows="5" required></textarea>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="diagnostico">Diagnóstico: <span id="diagnosticoValue"></span></label>
                      <textarea class="form-control" id="diagnostico" name="diagnostico" rows="5" required></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="manejo-recomendaciones">
                Manejo y Recomendaciones
              </div>
      
              <div class="row">
                
                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="esf_od">ESF_OD: <span id="esf_odValue"></span></label>
                      <input type="text" class="form-control" id="esf_od" name="esf_od" required>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="esf_oi">ESF_OI: <span id="esf_oiValue"></span></label>
                      <input type="text" class="form-control" id="esf_oi" name="esf_oi" required>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="cil_od">CIL_OD: <span id="cil_odValue"></span></label>
                      <input type="text" class="form-control" id="cil_od" name="cil_od" required>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="cil_oi">CIL_OI: <span id="cil_oiValue"></span></label>
                      <input type="text" class="form-control" id="cil_oi" name="cil_oi" required>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="eje_od">EJE_OD: <span id="eje_odValue"></span></label>
                      <input type="text" class="form-control" id="eje_od" name="eje_od" required>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="eje_oi">EJE_OI: <span id="eje_oiValue"></span></label>
                      <input type="text" class="form-control" id="eje_oi" name="eje_oi" required>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="dip_od">DIP_OD: <span id="dip_odValue"></span></label>
                      <input type="text" class="form-control" id="dip_od" name="dip_od" required>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="dip_oi">DIP_OI: <span id="dip_oiValue"></span></label>
                      <input type="text" class="form-control" id="dip_oi" name="dip_oi" required>
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="material">MATERIAL: <span id="materialValue"></span></label>
                      <input type="text" class="form-control" id="material" name="material" required>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="rx_armazon">RX_ARMAZÓN: <span id="rx_armazonValue"></span></label>
                      <input type="text" class="form-control" id="rx_armazon" name="rx_armazon" required>
                    </div>
                  </div>
                  
              </div>
    
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="plasticos">Plasticos:</label>
                    <input type="text" class="form-control" id="plasticos" name="plasticos" required>
                  </div>
        
                  <div class="form-group">
                    <label for="armazon">Armazón:</label>
                    <input type="text" class="form-control" id="armazon" name="armazon" required>
                  </div>
        
                  <div class="form-group">
                    <label for="totalPedido">Total de Pedido:</label>
                    <input type="text" class="form-control" id="totalPedido" name="totalPedido" required>
                  </div>
                </div>
                <br>
              <div class="print-button">
                <button type="submit" class="btn btn-success">Imprimir Receta</button>
              </div>
            </form>            
          </div>
        </div>
      </div>
  </div>

  </div>
  <button class="collapse-button hidden" id="collapseButton"><i class="fas fa-bars"></i></button>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/admin/js/boton.js"></script>
  <script>
    window.addEventListener('beforeunload', function (event) {
        event.returnValue = '¿Seguro que deseas salir? Los datos que has ingresado se perderán.';
    });
  </script>
</body>
</html>
