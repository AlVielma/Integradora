<?php
use App\Modelos\Conexion;

use App\Modelos\Trabajador;

require __DIR__.'/../../vendor/autoload.php';

$db = new Conexion();
$metodos = new Trabajador();

$id = $_GET['id'];

// Llamar a la función eliminar
$metodos->eliminar($id);

// Redireccionar al archivo index.php
header("Location: /../../../admin/app/trabaj.php");
exit(); // Asegurarse de que el código se detenga después de redireccionar
?>