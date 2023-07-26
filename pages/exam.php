<?php
session_start();
use App\Modelos\metodoscita;
use App\Modelos\validacionescita;
require_once __DIR__.'/../src/modelos/metodoscita.php';
require_once __DIR__.'/../src/modelos/validacionescita.php';
$cita = new metodoscita();
$vali = new validacionescita();

$errors = [];
$horariovalido = array();
$inicio = strtotime("9:00");
$fin = strtotime("20:00");
while ($inicio <= $fin) {
    $horariovalido[] = date("H:i", $inicio);
    $inicio = strtotime('+30 minutes', $inicio);
}

if(isset($_POST['mandar_exm']))
{   
    if(isset($_SESSION['user_name']))
    {   extract($_POST);
        $ocupado =$cita->verificarcitas($dia,$hora);
        if($ocupado->rowCount()>0)
        {
            $errors[]="Esta hora esta ocupada";
        }
        if($vali->numero($telefono))
        {
            $errors[]="El numero solo debe constar de 10 digitos";
        }
        if(!$vali->issnumber($telefono))
        {
            $errors[]="El numero debe ser numerico";
        }
        if($vali->nulo([$nombre,$telefono,$fecha_nacimiento,$dia,$hora,$sintomas_oculares,$enfermedades_oculares,$lentes_actualmente,$armazon,$contacto,$ultimo_examen,$uso_gotas]))
        {
            $errors[]="Todos los campos deben llenarse";
        }
        if($vali->caractmas($nombre))
        {
            $errors[]="El nombre no debe tener mas de 50 caracteres";
        }
        if(count($errors)==0)
        {
            $cita->agregar($_SESSION['user_id'],$nombre,$telefono,$fecha_nacimiento,$dia,$hora,$sintomas_oculares,$enfermedades_oculares,$lentes_actualmente,$armazon,$contacto,$ultimo_examen,$uso_gotas);

        }

    }
    else 
    {
        header('Location: login.php');
    }
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
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


    <!--Iconos y la bienvenida a la seccion-->
    <section id="container-fluid">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="header text-center">
                    <h2 class="text-uppercase mb-3 mt-4 allies-title">Pop Ópticos te invita a sacar tu examen de la vista!</h2>
                </div>
            </div>
        </div>
        <div class="row mt-4 text-center">
            <div class="d-flex flex-wrap justify-content-center">
                <div class="col-12 col-md-4 col-lg-3 step mx-3 mt-4 mt-lg-0">
                    <div class="img-box">
                        <img class="mx-auto d-block w-75 img-fluid" src="../images/iconogafas1.png" alt="icon lentes">
                    </div>
                    <small class="d-block mt-2 mb-4 pb-md-3 pb-lg-0 steps-title">
                        <strong>¿No tienes dinero?</strong>
                    </small>
                    <span class="steps-description">
                        <small>Tu examen es completamente gratuito</small>
                    </span>
                </div>
                <div class="col-12 col-md-4 col-lg-3 step mx-3 mt-4 mt-lg-0">
                    <div class="img-box">
                        <img class="mx-auto d-block w-75 img-fluid" src="../images/iconogafas2.png" alt="icon examen">
                    </div>
                    <small class="d-block mt-2 mb-4 steps-title">
                        <strong>Receta inmediata</strong>
                    </small>
                    <span class="steps-description">
                        <small>Al momento de realizar tu examen, tu receta se te dará inmediatamente</small>
                    </span>
                </div>
                <div class="col-12 col-md-4 col-lg-3 step mx-3 mt-4 mt-lg-0">
                    <div class="img-box">
                        <img class="mx-auto d-block w-75 img-fluid" src="../images/iconogafas3.png" alt="icon examen">
                    </div>
                    <small class="d-block mt-2 mb-4 steps-title">
                        <strong>Visítanos cuando quieras</strong>
                    </small>
                    <span class="steps-description">
                        <small>Nos ajustamos a tus horarios y tus preferencias</small>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!--Boton de agendar examen-->

    <section class="container-fluid mb-4 mt-4">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-5">
              <img src="../images/iconogafas4.png" alt="icon" class="img-fluid">
            </div>
            <div class="col-12 col-lg-7 d-flex align-items-center justify-content-center">
                <button class="btn btn-light btn-outline-dark btn-lg" data-bs-toggle="modal" data-bs-target="#myModal">Agenda ahora</button>
            </div>
                    
          </div>
        </div>
      </section>
    

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Agenda tu examen</h5>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container">
                <?php
                $vali->mensajes($errors);
                ?>
            </div>
            <div class="modal-body">
                <!--Formulario-->
                <form action="exam.php" method="POST">
                    <div class="form-group">
                        <label for="nombre" class="text-center">Nombre del paciente:</label>
                        <input type="text" class="form-control w-75 mx-auto" id="nombre" name="nombre" maxlengtha="50" requireda>
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="text-center">Teléfono:</label>
                        <input type="tel" class="form-control w-75 mx-auto" id="telefono" name="telefono" maxlength="10" requireda>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento" class="text-center">Fecha de nacimiento:</label>
                        <input type="date" class="form-control w-75 mx-auto" id="fecha_nacimiento" name="fecha_nacimiento" requireda>
                    </div>
                    <div class="form-group">
                        <label for="dia" class="text-center">Día:</label>
                        <input type="date" class="form-control w-75 mx-auto" id="dia" name="dia" requireda>
                    </div>
                    <div class="form-group">
                        <label for="hora" class="text-center">Hora:</label>
                        <select name="hora"class="form-control" id="hora">
                            <option value="">Horario</option>
                            <?php
                            foreach($horariovalido as $hora)
                            {
                                echo "<option value='$hora'>$hora</option>";
                            }
                            ?>
                           
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sintomas_oculares" class="text-center">Síntomas oculares:</label>
                        <textarea class="form-control w-75 mx-auto" id="sintomas_oculares" name="sintomas_oculares"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="enfermedades_oculares" class="text-center">Enfermedades oculares:</label>
                        <textarea class="form-control w-75 mx-auto" id="enfermedades_oculares" name="enfermedades_oculares"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="lentes_actualmente" class="text-center">¿Usa lentes actualmente?</label>
                        <select class="form-control w-75 mx-auto" id="lentes_actualmente" name="lentes_actualmente" requireda>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="armazon" class="text-center">¿Necesita armazón?</label>
                        <select class="form-control w-75 mx-auto" id="armazon" name="armazon" requireda>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contacto" class="text-center">¿Usa lentes de contacto?</label>
                        <select class="form-control w-75 mx-auto" id="contacto" name="contacto" requireda>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ultimo_examen" class="text-center">Fecha del último examen:</label>
                        <input type="date" class="form-control w-75 mx-auto" id="ultimo_examen" name="ultimo_examen" requireda>
                    </div>
                    <div class="form-group">
                        <label for="uso_gotas" class="text-center">¿Usa gotas oculares?</label>
                        <select class="form-control w-75 mx-auto" id="uso_gotas" name="uso_gotas" requireda>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" name="mandar_exm" class="btn btn-primary">Enviar</button>
                </form>

            </div>
        </div>
    </div>
</div>

  
   

    <!--footer-->
    <?php
           include 'footer.php';
           ?>

    <!--Javascript-->
    <!--Script de la api de leaflet-->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <!--Script de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
        crossorigin="anonymous"></script>
</body>

</html>