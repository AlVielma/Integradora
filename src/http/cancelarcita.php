<?php
use App\Modelos\metodoscita;
require_once __DIR__.'/../modelos/metodoscita.php';
require __DIR__.'/../../vendor/autoload.php';

if(isset($_POST['cancelar_cita']))
{
    $db = new metodoscita();
    $id = $_POST['id'];
    $db->eliminar($id);
    header('Location: /../../admin/app/agenda.php');
    exit(); 
}
else
{
    echo 'Error al eliminar';
}
?>