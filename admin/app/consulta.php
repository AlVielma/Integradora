<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Historial y Antecedentes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="/admin/css/consulta.css">
</head>

<body>
  <div class="sidebar" id="sidebar">
    <div class="logo">
      <img src="../img/logo.jpg" alt="Logo">
    </div>
    <a class="nav-link" href="aggimg.php"><i class="fas fa-box"></i><span>Gestionar Producto</span></a>
    <a class="nav-link" href="trabaj.php"><i class="fas fa-users"></i><span>Gestionar Trabajadores</span></a>
    <a class="nav-link" href="agenda.php"><i class="fas fa-calendar-alt"></i><span>Gestionar Agenda</span></a>
    <a class="nav-link" href="consulta.php"><i class="fas fa-stethoscope"></i><span>Realizar Consulta</span></a>
    <a class="nav-link" href="receta.php"><i class="fas fa-prescription"></i><span>Generar Receta</span></a>
    <br><br><br><br><br><br><br><br>
    <a class="nav-link" href="../index.php"><i class="fas fa-sign-out-alt"></i><span>Cerrar Sesión</span></a>
  </div>
  <div class="container-fluid" id="content">
    <h1>Historial y Antecedentes</h1>

    <form action="consultapdf.php" method="POST">
    <div class="row">
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
    </div>

    <h2>Consulta</h2>
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
        <input type="text" class="form-control" id="satO2" name="sat02">
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

    <h2>Consulta Salud Ocular</h2>
    <div class="row">
      <div class="col-md-3">
        <label for="avLejosOd">A.V Lejos O.D.:</label>
        <input type="text" class="form-control" id="avLejosOd" name="avLejosOd">
      </div>
      <div class="col-md-3">
        <label for="avCercaOd">A.V Cerca O.D.:</label>
        <input type="text" class="form-control" id="avCercaOd" name="avCercaOd">
      </div>
      <div class="col-md-3">
        <label for="avCercaOi">A.V Cerca O.I.:</label>
        <input type="text" class="form-control" id="avCercaOi" name="avCercaOi">
      </div>
      <div class="col-md-3">
        <label for="avCercaAo">A.V Cerca A.O.:</label>
        <input type="text" class="form-control" id="avCercaAo" name="avCercaAo">
      </div>
    </div>

    <h3>Rx En Uso</h3>
    <div class="row">
      <div class="col-md-4">
        <label for="rxUsoOd">OD:</label>
        <input type="text" class="form-control" id="rxUsoOd" name="rxUsoOd">
      </div>
      <div class="col-md-4">
        <label for="rxUsoOi">OI:</label>
        <input type="text" class="form-control" id="rxUsoOi" name="rxUsoOi">
      </div>
      <div class="col-md-4">
        <label for="rxUsoMaterial">Material:</label>
        <input type="text" class="form-control" id="rxUsoMaterial" name="rxUsoMaterial">
      </div>
    </div>

    <h2>Agudeza Visual Con Corrección</h2>
    <div class="row">
      <div class="col-md-4">
        <label for="avEOd">A.V.E O.D.:</label>
        <input type="text" class="form-control" id="avEOd" name="avEOd">
      </div>
      <div class="col-md-4">
        <label for="avEOi">A.V.E O.I.:</label>
        <input type="text" class="form-control" id="avEOi" name="avEOi">
      </div>
      <div class="col-md-4">
        <label for="avEAo">A.V.E A.O.:</label>
        <input type="text" class="form-control" id="avEAo" name="avEAo">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="mb-3">
          <label for="diagnostico">Diagnóstico:</label>
          <textarea class="form-control" id="diagnostico" rows="5" name="diagnostico"></textarea>
        </div>
      </div>

      <div class="col-md-6">
        <div class="mb-3">
          <label for="tratamiento">Tratamiento:</label>
          <textarea class="form-control" id="tratamiento" rows="5" name="tratamiento"></textarea>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    </form> 
  </div>

  <button class="collapse-button hidden" id="collapseButton"><i class="fas fa-bars"></i></button>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/admin/js/boton.js"></script>
</body>

</html>
