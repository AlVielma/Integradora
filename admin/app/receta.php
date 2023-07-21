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
<div class="sidebar" id="sidebar">
  <div class="logo">
    <img src="../img/logo.jpg" alt="Logo">
  </div>
  <a class="nav-link" href="aggimg.php"><i class="fas fa-box"></i><span>Gestionar Producto</span></a>
  <a class="nav-link" href="trabaj.php"><i class="fas fa-users"></i><span>Gestionar Trabajadores</span></a>
  <a class="nav-link" href="agenda.php"><i class="fas fa-calendar-alt"></i><span>Gestionar Agenda</span></a>
  <a class="nav-link" href="consulta.php"><i class="fas fa-stethoscope"></i><span>Realizar Consulta</span></a>
  <a class="nav-link" href="receta.php"><i class="fas fa-prescription"></i><span>Generar Receta</span></a>
  <a class="nav-link" href="../index.php"><i class="fas fa-sign-out-alt"></i><span>Cerrar Sesión</span></a>
</div>

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
      
                <!-- Agrega aquí más campos del formulario si los necesitas -->
      
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
              </div>
            </div>
              <div class="manejo-recomendaciones">
                Manejo y Recomendaciones
              </div>
      
              <div class="row">
                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="dip">DIP: <span id="dipValue"></span></label>
                      <input type="text" class="form-control" id="dip" name="dip" required>
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="armazon">ARMAZÓN: <span id="armazonValue"></span></label>
                      <input type="text" class="form-control" id="armazon" name="armazon" required>
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
                      <label for="esf">ESF: <span id="esfValue"></span></label>
                      <input type="text" class="form-control" id="esf" name="esf" required>
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="cil">CIL: <span id="cilValue"></span></label>
                      <input type="text" class="form-control" id="cil" name="cil" required>
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="eje">EJE: <span id="ejeValue"></span></label>
                      <input type="text" class="form-control" id="eje" name="eje" required>
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="prisma">PRISMA: <span id="prismaValue"></span></label>
                      <input type="text" class="form-control" id="prisma" name="prisma" required>
                    </div>
                  </div>
                
                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="od">O.D: <span id="odValue"></span></label>
                      <input type="text" class="form-control" id="od" name="od" required>
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="oi">O.I: <span id="oiValue"></span></label>
                      <input type="text" class="form-control" id="oi" name="oi" required>
                    </div>
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
</body>
</html>
