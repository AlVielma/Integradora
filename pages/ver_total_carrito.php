<?php
session_start();

require_once __DIR__ . '/../src/modelos/Carrito.php';
require_once __DIR__ . '/../src/modelos/productos.php';
require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use App\Modelos\Carrito;
use App\Modelos\productos;

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión o mostrar un mensaje de error.
    header("Location: login.php");
    exit;
}

// Crear un objeto de la clase Carrito
$carritoModelo = new Carrito();
$productosModelo = new productos();

// Obtener el ID del usuario actual desde la sesión
$usuario_id = $_SESSION['user_id'];

// Obtener los productos del carrito para el usuario actual desde la base de datos
$productosCarrito = $carritoModelo->obtenerProductosCarritoEstado1($usuario_id);


// Función para calcular el total de la compra
function calcularTotal($productosCarrito)
{
    $total = 0;
    foreach ($productosCarrito as $producto) {
        $total += ($producto['precio'] * $producto['cantidad']);
    }
    return $total;
}

// Verificar si se ha hecho clic en el botón de "Finalizar Compra"
if (isset($_POST['finalizar_compra'])) {

    // Finalizar la compra y obtener el ID de la compra recién realizada
    $compra_id = $carritoModelo->finalizarCompra($usuario_id);

    // Carga el autoloader de Composer
    require __DIR__ . '../../vendor/autoload.php';

    // Crea una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Cambia esto por el servidor SMTP que prefieras
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vafd.utt1@gmail.com';
        $mail->Password   = 'emqijncvtfirsmbj';
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
        foreach ($productosCarrito as $producto) {
            $contenidoCorreo .= '<tr>';
            $contenidoCorreo .= '<td>' . $producto['nombre'] . '</td>';
            $contenidoCorreo .= '<td>' . $producto['cantidad'] . '</td>';
            $contenidoCorreo .= '<td>$' . $producto['precio'] . '</td>';
            $contenidoCorreo .= '</tr>';
        }
        $contenidoCorreo .= '</table>';

        $contenidoCorreo .= '<p>Total: $' . calcularTotal($productosCarrito) . ' MXN';

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
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--Css-->
    <link rel="stylesheet" href="../css/index.css">
    <!--Icon-->
    <link rel="icon" href="../images/icon.png">
    <title>Ver Total del Carrito</title>
</head>

<body>
    <!--Header-->
    <?php include 'header.php'; ?>

    <!--Contenido-->
    <div class="container mt-4 mb-4">
        <h2 class="text-center">Total del Carrito</h2>
        <form action="ver_total_carrito.php" method="post">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalCarrito = 0;
                    foreach ($productosCarrito as $producto) {
                        $nombre = $producto['nombre'];
                        $cantidad = $producto['cantidad'];
                        $precio = $producto['precio'];
                        $totalProducto = $cantidad * $precio;
                        $totalCarrito += $totalProducto;
                    ?>
                        <tr>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $cantidad; ?></td>
                            <td>$<?php echo number_format($precio, 2); ?></td>
                            <td>$<?php echo number_format($totalProducto, 2); ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end fw-bold">Total del Carrito:</td>
                        <td>$<?php echo number_format($totalCarrito, 2); ?></td>
                    </tr>
                </tfoot>
            </table>

            <div class="text-center">
                <!-- Botón para finalizar la compra -->
                <button type="submit" name="finalizar_compra" class="btn btn-success btn-lg">Finalizar Compra</button>
            </div>
        </form>
    </div>

    <!--footer-->
    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>
