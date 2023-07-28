<?php
use App\Modelos\metodoscita;
require_once __DIR__.'/../modelos/metodoscita.php';
$metodo = new metodoscita();
$id = $_GET['id'];
$metodo->hecho($id);
header('Location: /../../admin/app/agenda.php');
exit();

?>