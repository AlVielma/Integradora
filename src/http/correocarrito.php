<?php
// Importa las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
// Carga el autoloader de Composer
require __DIR__ .'/../../vendor/autoload.php';



// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión o mostrar un mensaje de error.
    header("Location: login.php");
    exit;
}

// Verificar si se ha hecho clic en el botón de "Finalizar Compra"
if (isset($_POST['finalizar_compra'])) {
    // Obtener los productos comprados por el usuario desde la sesión
    $productosComprados = $_SESSION['productos_comprados'];
}
// Crea una nueva instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Cambia esto por el servidor SMTP que prefieras
    $mail->SMTPAuth   = true;
    $mail->Username   = 'vafd_utt1@gmail.com';
    $mail->Password   = 'nuvikduzuldfywjy';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Configura los destinatarios y el contenido del correo
    $mail->setFrom('vafd_utt1@gmail.com', 'Pop Ópticos'); // Cambia esto por tu dirección de correo electrónico y nombre
    $mail->addAddress($_SESSION['user_email'], $_SESSION['user_name'] . ' ' . $_SESSION['user_lastname']); // Agrega al usuario como destinatario

    // Configura el contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Confirmación de compra';
    
    // Construye el contenido del correo con los productos comprados y su cantidad
    $contenidoCorreo = '<h3>Detalles de la compra:</h3>';
    $contenidoCorreo .= '<table>';
    $contenidoCorreo .= '<tr><th>Producto</th><th>Cantidad</th><th>Precio</th></tr>';
    foreach ($productosComprados as $producto) {
        $contenidoCorreo .= '<tr>';
        $contenidoCorreo .= '<td>' . $producto['nombre'] . '</td>';
        $contenidoCorreo .= '<td>' . $producto['cantidad'] . '</td>';
        $contenidoCorreo .= '<td>$' . $producto['precio'] . '</td>';
        $contenidoCorreo .= '</tr>';
    }
    $contenidoCorreo .= '</table>';

    $contenidoCorreo .= '<p>Total: $' . calcularTotal($productosComprados) . ' MXN</p>'; 



    // Agrega el contenido del correo al cuerpo del mensaje
    $mail->Body = $contenidoCorreo;

    // Envía el correo
    $mail->send();

    // Redirecciona a la página principal y muestra una alerta
    echo '<script>alert("El correo ha sido enviado correctamente");</script>';
    echo '<script>window.location.href = "../index.php";</script>';
} catch (Exception $e) {
    echo '<script>alert("No se pudo enviar el correo. Error del correo: ' . $mail->ErrorInfo . '");</script>';
}

// Función para calcular el total de la compra
function calcularTotal($productosComprados) {
    $total = 0;
    foreach ($productosComprados as $producto) {
        $total += ($producto['precio'] * $producto['cantidad']);
    }
    return $total;
}