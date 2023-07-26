<?php
use App\Modelos\Trabajador;
require_once __DIR__.'/../modelos/trabajador.php';

require __DIR__.'/../../vendor/autoload.php';

if (isset($_POST['aceptar'])) {
    extract($_POST);
    if (empty($nombre) || empty($apellido) || empty($email) || empty($contraseña)) {
        // Si algún campo está vacío, redirige al usuario a la página index.php con un mensaje de error
        header('Location: /../../../admin/app/trabaj.php?error=Campos vacíos');
        exit;
    }

    // Asignar el id_rol apropiado para el nuevo usuario, en este caso, 1 para "Administrador"
    $id_rol = 1;

    $obj = new Trabajador();
    $obj->agregar($nombre, $apellido, $email, $contraseña, $id_rol);

    // Si todo fue exitoso, redirige al usuario a la página index.php con un mensaje de éxito
    header('Location: /../../../admin/app/trabaj.php?success=Trabajador agregado exitosamente');
    exit;
} else {
    // Si no se recibió el formulario, muestra un mensaje de fallo
    echo "Fallo al agregar";
}
?>
