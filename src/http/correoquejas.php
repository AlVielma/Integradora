<?php
// correoquejas.php

// Importa las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Carga el autoloader de Composer
require __DIR__ . '/../../vendor/autoload.php';

// Verifica si el formulario fue enviado antes de procesar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $comentario = $_POST["comentario"];

    // Crea una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configura los ajustes del servidor SMTP
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Habilita la salida detallada del servidor SMTP
        $mail->isSMTP();
        // ...

        // Configura los destinatarios
        $mail->setFrom($email, $nombre);
        // ...

        // Configura el contenido del correo
        // ...

        // Envía el correo
        $mail->send();

        // Redirecciona a la página principal y muestra una alerta
        echo '<script>alert("El correo ha sido enviado correctamente");</script>';
        echo '<script>window.location.href = "index.php";</script>';
        exit(); // Asegura que no se ejecuten más líneas de código después de la redirección
    } catch (Exception $e) {
        echo '<script>alert("No se pudo enviar el correo. Error del correo: ' . $mail->ErrorInfo . '");</script>';
    }
}
