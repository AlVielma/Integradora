<?php
use App\Modelos\productos;
require __DIR__.'/../../vendor/autoload.php';

if(isset($_POST['eliminar']))
{
    $db = new productos();
    $id = $_POST['id'];
    $db->eliminarproducto($id);
    $db->eliminarimg($id);
    header('Location: /../../admin/app/aggimg.php');
    exit(); 
}
else
{
    echo 'Error al eliminar';
}
?>