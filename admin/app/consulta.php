<?php
use App\Modelos\ValidacionesConsultas;
require_once __DIR__.'/../../src/modelos/ValidacionesConsultas.php';
require_once __DIR__ . '/../../vendor/autoload.php';
$validacionesConsultas = new ValidacionesConsultas();
session_start();
$erroresConsulta = isset($_GET['errores']) ? json_decode($_GET['errores'], true) : [];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial y Antecedentes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/admin/css/consulta.css">
</head>
<body>
    <!--Sidebar-->
<?php include 'sidebar.php';
?>
    
    <div class="container-fluid" id="content">
      
        <form action="consultapdf.php" method="POST">

            <div class="row">
           
            <div class="mb-3">
                  <label for="nombre">Nombre del paciente:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="" requireda>
                </div>
                <div class="mb-3">
                  <label for="edad">Edad:</label>
                  <input type="text" class="form-control" id="edad" name="edad" value="" requireda>
                </div>
                <h1>Historial y Antecedentes</h1>
                <div class="col-md-3">
                    <label for="cefaleas">Cefaleas:</label>
                    <input type="checkbox" id="cefaleas" name="cefaleas" value="true">
                </div>
                <div class="col-md-3">
                    <label for="fatigaOcular">Fatiga Ocular:</label>
                    <input type="checkbox" id="fatigaOcular" name="fatigaOcular" value="true">
                </div>
                <div class="col-md-3">
                    <label for="ojoRojo">Ojo Rojo:</label>
                    <input type="checkbox" id="ojoRojo" name="ojoRojo" value="true">
                </div>
                <div class="col-md-3">
                    <label for="borrosidad">Borrosidad:</label>
                    <input type="checkbox" id="borrosidad" name="borrosidad" value="true">
                </div>
            </div> <!-- <h2>Consulta</h2> se elimino esta etiqueta -->
            <div class="row">
                <div class="col-md-6">
                    <label for="ta">TA:</label>
                    <input type="text" class="form-control" id="ta" name="ta">
                </div>
                <div class="col-md-6">
                    <label for="fc">FC:</label>
                    <input type="text" class="form-control" id="fc" name="fc">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="satO2">SatO2:</label>
                    <input type="text" class="form-control" id="satO2" name="satO2">
                </div>
                <div class="col-md-6">
                    <label for="glicemia">Glicemia Capilar:</label>
                    <input type="text" class="form-control" id="glicemia" name="glicemia">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="dm">DM:</label>
                    <input type="checkbox" id="dm" name="dm" value="true">
                </div>
                <div class="col-md-3">
                    <label for="hta">HTA:</label>
                    <input type="checkbox" id="hta" name="hta" value="true">
                </div>
            </div>
            <h3>Rx En Uso</h3>
            <div class="row">
                <div class="col-md-4">
                    <label for="rxUsoOd">OD:</label>
                    <input type="text" class="form-control" id="rxUsoOd" name="rxUsoOd" requireda>
                </div>
                <div class="col-md-4">
                    <label for="rxUsoOi">OI:</label>
                    <input type="text" class="form-control" id="rxUsoOi" name="rxUsoOi" requireda>
                </div>
                <div class="col-md-4">
                    <label for="rxUsoMaterial">Material:</label>
                    <input type="text" class="form-control" id="rxUsoMaterial" name="rxUsoMaterial">
                </div>
            </div>
            <h2>Agudeza Visual Con Corrección</h2>
            <div class="row">
                <div class="col-md-4">
                    <label for="avEOd">A.V.C.L O.D.:</label> <!--SE MODIFICO DE AVE A AVCL-->
                    <input type="text" class="form-control" id="avEOd" name="avEOd">
                </div>
                <div class="col-md-4">
                    <label for="avEOi">A.V.C.L O.I.:</label>
                    <input type="text" class="form-control" id="avEOi" name="avEOi">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="descripcion">Descripcion:</label>
                        <textarea class="form-control" id="descripcion" rows="5" name="descripcion"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="aceptar">Guardar</button>
            <?php
    
    if (is_array($erroresConsulta) && count($erroresConsulta) > 0) {
        $validacionesConsultas->msj($erroresConsulta);
    }
    ?>
        </form>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/public/js/boton.js"></script>
   
</body>
</html>
