<?php
/* este es exam.php */
require __DIR__ . '/../vendor/autoload.php';
use App\Modelos\metodoscita;

$metodoscita = new metodoscita();
session_start();
<<<<<<< HEAD

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregarexam'])) {
    // Capturar los datos del formulario
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $dia = $_POST['dia'];
    $hora = $_POST['hora'];
    $sintomas_oculares = $_POST['sintomas_oculares'];
    $enfermedades_oculares = $_POST['enfermedades_oculares'];
    $lentes_actualmente = $_POST['lentes_actualmente'];
    $armazon = $_POST['armazon'];
    $contacto = $_POST['contacto'];
    $ultimo_examen = $_POST['ultimo_examen'];
    $uso_gotas = $_POST['uso_gotas'];

    // Llamar al método agregar con los valores capturados del formulario
    $metodoscita->agregar($nombre, $telefono, $fecha_nacimiento, $dia, $hora, $sintomas_oculares, $enfermedades_oculares, $lentes_actualmente, $armazon, $contacto, $ultimo_examen, $uso_gotas);
=======
use App\Modelos\metodoscita;
use App\Modelos\validacionescita;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__.'/../vendor/phpmailer/phpmailer/src/Exception.php';
require_once __DIR__.'/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__.'/../vendor/phpmailer/phpmailer/src/SMTP.php';
require_once __DIR__.'/../src/modelos/metodoscita.php';
require_once __DIR__.'/../src/modelos/validacionescita.php';
require __DIR__ . '/../vendor/autoload.php';
$cita = new metodoscita();
$vali = new validacionescita();
$errors = [];
$horariovalido = array();
$inicio = strtotime("9:00");
$fin = strtotime("20:00");
while ($inicio <= $fin) {
    $horariovalido[] = date("H:i", $inicio);
    $inicio = strtotime('+1 hour', $inicio);
}

if(isset($_POST['mandar_exm']))
{   
    if(isset($_SESSION['user_name']))
    {   extract($_POST);
        $ocupado =$cita->verificarcitas($dia,$hora);#SANITIZACION DE SCRIPTS
        $nombres=$vali->filtrarString($nombre);
        $sintomasocc=$vali->filtrarString($sintomas_oculares);
        $enfermedadesoc=$vali->filtrarString($enfermedades_oculares);
            // Obtener la hora actual
        $hora_actual = date('H:i');

        // Obtener el día seleccionado y convertirlo a formato Y-m-d para compararlo con el día actual
        $dia_seleccionado = $_POST['dia'];
        $dia_seleccionado_formato = date('Y-m-d', strtotime($dia_seleccionado));

        // Obtener la hora seleccionada por el usuario
        $hora_seleccionada = $_POST['hora'];

        // Comprobar si la hora seleccionada es anterior a la hora actual y el día seleccionado es el mismo que el día actual
        if ($dia_seleccionado_formato === date('Y-m-d') && $hora_seleccionada < $hora_actual) {
            $errors[] = "No se puede seleccionar una hora anterior a la hora actual.";
        }
        if($ocupado->rowCount()>0)#SI UNA HORA ESTA OCUPADA EL MISMO DIA Y DEVUELVE 1 FILA
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
        if($vali->nulo([$nombre,$telefono,$fecha_nacimiento,$dia,$hora,$lentes_actualmente,$armazon,$contacto,$uso_gotas]))
        {
            $errors[]="Los campos deben llenarse, solo Fecha del Ultimo examen, Síntomas oculares y Enfermedades oculares son opcionales";
        }
        if($vali->caractmas($nombre))
        {
            $errors[]="El nombre no debe tener mas de 50 caracteres";
        }
        if(count($errors)==0)
        {
           if($nombres == $nombre && $sintomasocc==$sintomas_oculares && $enfermedadesoc==$enfermedades_oculares)
           {
            $cita->agregar($_SESSION['user_id'],$nombres,$telefono,$fecha_nacimiento,$dia,$hora,$sintomasocc,$enfermedadesoc,$lentes_actualmente,$armazon,$contacto,$ultimo_examen,$uso_gotas);
            #CORREO
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    
                $mail->isSMTP();                                          
                $mail->Host = 'smtp.gmail.com';                    
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'fgolmos10@gmail.com';                   
                $mail->Password   = 'irpfvhqxqxyivwbt';                               
                $mail->SMTPSecure = 'tls';            
                $mail->Port = 587;                           
                    $persona = '<h1>CITA AGENDADA POR'.$nombres.'</h3>';
                    $contenido = '<h3>CITA EL DIA '.$dia.'A LAS '.$hora.'</h3>';
                $mail->setFrom('fgolmos10@gmail.com', $nombres);
                $mail->addAddress($_SESSION['user_email']);
             
                $mail->isHTML(true);                                
                $mail->Subject = 'CITA';
                $mail->Body    = ''.$persona.''.$contenido;
                $mail->send();
                header('Location: exam.php');
               
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
           }
           else
           {
            $errors[] = "Hubo un problema con los datos ingresados.";
           }

        }

    }
    else 
    {
        header('Location: login.php');
    }
   
>>>>>>> e513c5118efd58b1f8fe455b8472a39146efdf58
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
        <div class="">
            <?php
                $vali->mensajes($errors);
                ?>
            </div>
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
<<<<<<< HEAD
                    
=======
           
          </div>
>>>>>>> e513c5118efd58b1f8fe455b8472a39146efdf58
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
               
            </div>
            <div class="modal-body">
<<<<<<< HEAD
            <form action="exam.php" method="post">
=======
                <!--Formulario-->
                <form action="exam.php" method="POST">
>>>>>>> e513c5118efd58b1f8fe455b8472a39146efdf58
                    <div class="form-group">
                        <label for="nombre" class="text-center">Nombre del paciente:</label>
                        <input type="text" class="form-control w-75 mx-auto" id="nombre" name="nombre" maxlengtha="50" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="text-center">Teléfono:</label>
                        <input type="tel" class="form-control w-75 mx-auto" id="telefono" name="telefono" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento" class="text-center">Fecha de nacimiento:</label>
                        <input type="date" class="form-control w-75 mx-auto" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="dia" class="text-center">Día:</label>
                        <input type="date" class="form-control w-75 mx-auto" id="dia" name="dia" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+10 days')); ?>" required>
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
                        <select class="form-control w-75 mx-auto" id="lentes_actualmente" name="lentes_actualmente" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="armazon" class="text-center">¿Necesita armazón?</label>
                        <select class="form-control w-75 mx-auto" id="armazon" name="armazon" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contacto" class="text-center">¿Usa lentes de contacto?</label>
                        <select class="form-control w-75 mx-auto" id="contacto" name="contacto" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ultimo_examen" class="text-center">Fecha del último examen:</label>
                        <input type="date" class="form-control w-75 mx-auto" id="ultimo_examen" name="ultimo_examen" required>
                    </div>
                    <div class="form-group">
                        <label for="uso_gotas" class="text-center">¿Usa gotas oculares?</label>
                        <select class="form-control w-75 mx-auto" id="uso_gotas" name="uso_gotas" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
<<<<<<< HEAD
                    <button type="submit" class="btn btn-primary" name="agregarexam">Enviar</button></form>
=======
                    <button type="submit" name="mandar_exm" class="btn btn-primary">Enviar</button>
>>>>>>> e513c5118efd58b1f8fe455b8472a39146efdf58
                </form>

            </div>
        </div>
    </div>
</div>
    <!--footer-->
<<<<<<< HEAD
    <div class="container-fluid border border-black footer bg-dark text-white">
        <!--Footer superio-->
        <div class="row p-5 text-aling-center">
            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <h3>Pop Ópticos</h3>
                <a href="index.html"><img src="../images/icon64.png" alt=""></a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <p class="h5">Dirección</p>
                <div class="mb-2">
                    <p>Av.Juárez 4880 y Xochimilco Oriente, Torreón, Méxcio</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <p class="h5">Contacto</p>
                <div class="mb-2">
                    <p>871 735 8778</p>
                </div>
                <div class="mb-2">
                    <a class="text-decoration-none text-white"
                        href="mailto:ventas@opticapop.com">ventas@opticapop.com</a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <p class="h5">Redes</p>
                <div class="mb-2">
                    <a href="https://www.facebook.com/opticaPOP/"><img src="../images/facebook.png" alt=""></a>
                </div>
                <div class="mb-0">
                    <p>Facebook</p>
                </div>
                <div class="mb-2">
                    <a href="https://wa.link/35sn9o"><img src="../images/whatsapp.png" alt=""></a>
                </div>
                <div class="mb-0">
                    <p>Whatsapp</p>
                </div>
            </div>
            <!--Derechos de autor-->
            <div class="col-xs-12 pt-5">
                <p class="text-white text-center"> Copyright - All rights reserved © 2023</p>
            </div>

        </div>

    </div>
=======
    <?php
           include 'footer.php';
           ?>
>>>>>>> e513c5118efd58b1f8fe455b8472a39146efdf58

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
        <script>
  function enviarFormulario() {
    // Obtener los datos del formulario
    var formData = $('#formExamen').serialize();

    // Realizar la solicitud AJAX para enviar los datos al servidor
    $.ajax({
      type: 'POST',
      url: 'procesar_formulario.php', // Reemplaza 'procesar_formulario.php' con la ruta correcta al archivo PHP que procesa el formulario y agrega los datos a la base de datos
      data: formData,
      success: function(response) {
        // Si la solicitud se completa exitosamente, puedes mostrar un mensaje de éxito o redirigir al usuario a otra página
        alert('Formulario enviado correctamente');
        window.location.href = 'exam.php';
      },
      error: function(xhr, status, error) {
        // Si ocurre algún error en la solicitud AJAX, puedes mostrar un mensaje de error al usuario
        alert('Error al enviar el formulario');
      }
    });
  }
</script>

</body>

</html>