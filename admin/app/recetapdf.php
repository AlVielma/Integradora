<?php
require 'PDFGenerator.php';

$pdfGenerator = new PDFGenerator();

ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Receta</title>
  <style>
    body {
      width: 100%;
      height: 100%;
    }

    .modal-title {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .row {
      width: 100%;
    }

    .row2 {
      margin-bottom: 20px;
      width: 100%;
    }

    .col1{
      margin-top: 10px;
      width: 50%;
      float: left;
    }

    .col2 {
      margin-top: 10px;
      width: 50%;
      margin-left: 100px;
      float: left;
    }

    label {
      font-weight: bold;
      margin-bottom: 10px;
    }
    .logo img {
      width: 70px;
      height: auto;
    }
    #firm{
      margin: center;
      margin-left: 260px;
    }
    #lin{
      margin-top: 70px;
      margin: center;
      margin-left: 220px;
    }
    .col3{
      top: 60px;
    }
  .lab{
    font-size: x-large;
  }
  </style>
</head>
<body>
<div class="logo">
      <?php 
      $image = '../img/logo.jpg'; 
      $imageData = base64_encode(file_get_contents($image));
      $mine = mime_content_type($image);
      $src = "data:{$mine};base64,{$imageData}";
      echo '<img src="'.$src.'">';
      ?>
    </div>
  <div class="container-fluid">
    <!-- Modal -->
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="recetaModalLabel">Receta</h5>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="form-group">
              <label for="nombre">Nombre del paciente:</label>
              <?php echo $_POST['nombre']; ?>
            </div>

            <div class="form-group">
              <label for="edad">Edad:</label>
              <?php echo $_POST['edad']; ?>
            </div>
          </div>

          <div class="ab">
            <hr><br>
              <div class="form-group trat">
                <label for="tratamiento">Tratamiento: <span id="tratamientoValue"></span></label>
                <?php echo $_POST['tratamiento']; ?>
              </div>

              <div class="form-group diag">
                <label for="diagnostico">Diagnóstico: <span id="diagnosticoValue"></span></label>
                <?php echo $_POST['diagnostico']; ?>
              </div>
              <hr>
            </div>

          <div class="row2">
            <div class="col1">

              <div class="form-group">
                <label for="esf_od">O.D ESF: <span id="esf_odValue"></span></label>
                <?php echo $_POST['esf_od']; ?>
              </div>

              <div class="form-group">
                <label for="esf_oi">O.I ESF: <span id="esf_oiValue"></span></label>
                <?php echo $_POST['esf_oi']; ?>
              </div>

              <div class="form-group">
                <label for="cil_od">O.D CIL: <span id="cil_odValue"></span></label>
                <?php echo $_POST['cil_od']; ?>
              </div>

              <div class="form-group">
                <label for="cil_oi">O.I CIL: <span id="cil_oiValue"></span></label>
                <?php echo $_POST['cil_oi']; ?>
              </div>

              <div class="form-group">
                <label for="eje_od">O.D EJE: <span id="eje_odValue"></span></label>
                <?php echo $_POST['eje_od']; ?>
              </div>

            </div>

            <div class="col2">

              <div class="form-group">
                <label for="eje_oi">O.I EJE: <span id="eje_oiValue"></span></label>
                <?php echo $_POST['eje_oi']; ?>
              </div>

              <div class="form-group">
                <label for="dip_od">O.D DIP: <span id="dip_odValue"></span></label>
                <?php echo $_POST['dip_od']; ?>
              </div>

              <div class="form-group">
                <label for="dip_oi">O.I DIP: <span id="dip_oiValue"></span></label>
                <?php echo $_POST['dip_oi']; ?>
              </div>

              <div class="form-group">
                <label for="material">MATERIAL: <span id="materialValue"></span></label>
                <?php echo $_POST['material']; ?>
              </div>

              <div class="form-group">
                <label for="rx_armazon">RX_ARMAZÓN: <span id="rx_armazonValue"></span></label>
                <?php echo $_POST['rx_armazon']; ?>
              </div>
            </div>

            <div class="col3">
              <div class="form-group">
                <label class="lab" for="plasticos">Plasticos:</label>
                <?php echo $_POST['plasticos']; ?>
              </div>

              <div class="form-group">
                <label class="lab" for="armazon">Armazón:</label>
                <?php echo $_POST['armazon']; ?>
              </div>

              <div class="form-group">
                <label class="lab" for="totalPedido">Total de Pedido:</label>
                <?php echo $_POST['totalPedido']; ?>
              </div>
            </div>
            
            <div class="form-group" id="firm">
              <br><br><br>
              <label for="firma">Firma del Optometrista:</label>
            </div>
            <div id="lin">
              <p>-------------------------------------------------</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php
$html = ob_get_clean();

// Generar el PDF
$pdfGenerator->generatePDF($html);
?>
