<?php
/*emailverificacion.php*/
// Importa las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Carga el autoloader de Composer

require __DIR__.'/../../vendor/autoload.php';

class EnviarVerificacion
{
    public function enviarCorreoToken($nombresinj, $apelliinj, $email, $token)
    {
        echo '<script>alert("Si entro a la fucion);</script>';

        //Codigo enviar correo
        // Crea una nueva instancia de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configura los ajustes del servidor SMTP
            extract($_POST);
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Habilita la salida detallada del servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'prueba1correo123@gmail.com';
            $mail->Password   = 'fnnpzrhlqnqqypua';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       =  587;

        // Configura los destinatarios y el contenido del correo
        $mail->setFrom('prueba1correo123@gmail.com', 'Pop Ópticos'); // Cambia esto por tu dirección de correo electrónico y nombre
        $mail->addAddress($email, $nombresinj . ' ' . $apelliinj); // Agrega al usuario como destinatario

            // Configura el contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Esto es una prueba';
            $mail->Body    = 'Hola, ' . $nombre . ' ' . $apellido . '!<br><br>.su codigo de activacion es ' . $token;

            // Envía el correo
            $mail->send();
            // Redirecciona a la página principal y muestra una alerta
            echo '<script>alert("El correo ha sido enviado correctamente");</script>';
            echo '<script>window.location.href = "../index.php";</script>';
        } catch (Exception $e) {
            echo '<script>alert("No se pudo enviar el correo. Error del correo: ' . $mail->ErrorInfo . '");</script>';
        }
  
    } 
 }

?>