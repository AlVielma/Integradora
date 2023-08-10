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
            $mail->SMTPDebug = false;                      // Habilita la salida detallada del servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'popopticosverificaciontoken@gmail.com';
            $mail->Password   = 'rjkrhcucrnlrhjck';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       =  587;

        // Configura los destinatarios y el contenido del correo
        $mail->setFrom('popopticosverificaciontoken@gmail.com', 'Pop Ópticos'); // Cambia esto por tu dirección de correo electrónico y nombre
        $mail->addAddress($email, $nombresinj . ' ' . $apelliinj); // Agrega al usuario como destinatario

            // Configura el contenido del correo
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Código de verificación';
            $mail->Body = <<<EOT
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f5f5f5;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        max-width: 600px;
                        margin: 20px auto;
                        background-color: #ffffff;
                        padding: 20px;
                        border-radius: 5px;
                        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    }
                    .logo {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    .content {
                        font-size: 16px;
                        line-height: 1.6;
                    }
                    .verification-code {
                        font-size: 24px;
                        font-weight: bold;
                        color: #007bff;
                    }
                    .log{
                        height: 170px;
                        width: 170px;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="logo">
                        <img class="log" src="cid:icon" alt="Logo de Pop Ópticos">
                    </div>
                    <div class="content">
                        <p>Hola <b>{$nombresinj} {$apelliinj}</b>,</p>
                        <p>Estamos emocionados de tenerte como parte de la comunidad de Pop Ópticos.</p>
                        <p>Para verificar tu cuenta, por favor ingresa el siguiente código de verificación:</p>
                        <p class="verification-code">{$token}</p>
                        <p>Ingresa este código en la página de verificación para completar el proceso.</p>
                        <p>¡Gracias por confiar en nosotros!</p>
                        <p>El equipo de Pop Ópticos</p>
                    </div>
                </div>
            </body>
            </html>
            EOT;

            // Adjuntar la imagen al correo (usando el CID)
            $attachmentPath = $_SERVER['DOCUMENT_ROOT'] . '/images/icon.png';
            $mail->AddAttachment($attachmentPath, 'icon.png');

            // Envía el correo
            $mail->send();
            echo '<script>window.location.href = "/pages/verificacion_usuario.php";</script>';
        } catch (Exception $e) {
            echo '<script>alert("No se pudo enviar el correo. Error del correo: ' . $mail->ErrorInfo . '");</script>';
        }
    } 
 }

?>