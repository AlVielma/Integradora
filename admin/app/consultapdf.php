<?php
require 'PDFGenerator.php';
use App\Modelos\ValidacionesConsultas;
$pdfGenerator = new PDFGenerator();
$validacionc= new ValidacionesConsultas();
$errores=[];
extract($_POST);
if(isset($_POST['aceptar']))
{

  if($validacionc->nulo([$nombre,$edad,$rxUsoOd,$rxUsoOi]))
  {
    $errores[]="Los campos nombre,edad,od y oi deben llenarse";
  }
  if(!$validacionc->mayor6($edad))
  {
    $errores[]="Debe ser mayor a 6 años";
  }
  if(count($errores)==0)
  {
    ob_start(); 
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Historial y Antecedentes</title>
      <style>
        .content {
          width: 100%;
        }
        
        .row {
          display: flex;
          justify-content: space-between;
        }
        
        .column {
          width: 48%;
        }
        
        h1, h2, h3 {
          margin-bottom: 10px;
        }

        .logo img {
          width: 70px;
          height: auto;
        }
        
        .diag, .trat {
          width: 700px; /* o width: 100%; */
          height: auto;
          word-wrap: break-word;
        }
      </style>
    </head>

    <body>
      <div class="logo">
        <?php 
          $image = '../img/logo.jpg'; 
          $imageData = base64_encode(file_get_contents($image)); //me lo hace base64
          $mine = mime_content_type($image); //formato
          $src = "data:{$mine};base64,{$imageData}";
          echo '<img src="'.$src.'">';
        ?>
      </div>
      <div class="content">

        <form action="consultapdf.php" method="POST">
          <div class="row">
            <div class="column">
              <h2>Historial y Antecedentes</h2>
              <div class="mb-3">
                      <label for="nombre">Nombre del paciente:</label>
                      <?php echo $_POST['nombre']; ?>
                    </div>
                    <div class="mb-3">
                      <label for="edad">Edad:</label>
                      <?php echo $_POST['edad']; ?>
                    </div>
              <div class="mb-3">
                <label for="cefaleas">Cefaleas:</label>
                <?php
                if (isset($_POST['cefaleas']) && $_POST['cefaleas'] === "true") {
                  echo '(x)';
                } else {
                  echo '()';
                }
                ?>
              </div>
              <div class="mb-3">
                <label for="fatigaOcular">Fatiga Ocular:</label>
                <?php
                if (isset($_POST['fatigaOcular']) && $_POST['fatigaOcular'] === "true") {
                  echo '(x)';
                } else {
                  echo '()';
                }
                ?>
              </div>
              <div class="mb-3">
                <label for="ojoRojo">Ojo Rojo:</label>
                <?php
                if (isset($_POST['ojoRojo']) && $_POST['ojoRojo'] === "true") {
                  echo '(x)';
                } else {
                  echo '()';
                }
                ?>
              </div>
              <div class="mb-3">
                <label for="borrosidad">Borrosidad:</label>
                <?php
                if (isset($_POST['borrosidad']) && $_POST['borrosidad'] === "true") {
                  echo '(x)';
                } else {
                  echo '()';
                }
                ?>
              </div>
            </div>
          
            <div class="column">
            
              <div class="mb-3">
                <label for="ta">TA:</label>
                <?php echo $_POST['ta']; ?>
              </div>
              <div class="mb-3">
                <label for="fc">FC:</label>
                <?php echo $_POST['fc']; ?>
              </div>
              <div class="mb-3">
                <label for="satO2">SatO2:</label>
                <?php echo $_POST['satO2']; ?>
              </div>
              <div class="mb-3">
                <label for="glicemia">Glicemia Capilar:</label>
                <?php echo $_POST['glicemia']; ?>
              </div>
          
              <div class="mb-3">
                <label for="dm">DM:</label>
                <?php
                if (isset($_POST['dm']) && $_POST['dm'] === "true") {
                  echo '(x)';
                } else {
                  echo '()';
                }
                ?>
              </div>
              <div class="mb-3">
                <label for="hta">HTA:</label>
                <?php
                if (isset($_POST['hta']) && $_POST['hta'] === "true") {
                  echo '(x)';
                } else {
                  echo '()';
                }
                ?>
              </div>
            </div>
          </div>


          <h3>Rx En Uso</h3>
          <div class="mb-3">
            <label for="rxUsoOd">OD:</label>
            <?php echo $_POST['rxUsoOd']; ?>
          </div>
          <div class="mb-3">
            <label for="rxUsoOi">OI:</label>
            <?php echo $_POST['rxUsoOi']; ?>
          </div>
          <div class="mb-3">
            <label for="rxUsoMaterial">Material:</label>
            <?php echo $_POST['rxUsoMaterial']; ?>
          </div>
          
          <h2>Agudeza Visual Con Corrección</h2>
          <div class="mb-3">
            <label for="avEOd">A.V.E O.D.:</label>
            <?php echo $_POST['avEOd']; ?>
          </div>
          <div class="mb-3">
            <label for="avEOi">A.V.E O.I.:</label>
            <?php echo $_POST['avEOi']; ?>
          </div>    

          <div class="mb-3">
            <label for="descripcion">Descripcion:</label>
            <?php echo $_POST['descripcion']; ?>      
          </div>

        </form>
      </div>
    </body>
    </html>
  
    <?php
    $html = ob_get_clean();

    // Generar el PDF
    $pdfGenerator->generatePDF($html);
  }
  else
  {
    $erroresJson = json_encode($errores);
    $url = 'consulta.php?errores=' . urlencode($erroresJson);
    header('Location: ' . $url);
    exit();
  }
  
}
  

?>
