<?php
namespace App\Modelos;
class ValidacionesConsulta {
    public static function validarNombre($nombre) {
        if (empty(trim($nombre))) {
            return "El nombre es obligatorio.";
        }
        return ""; 
    }

    public static function validarEdad($edad) {
        if (empty($edad) || !is_numeric($edad)) {
            return "La edad debe ser un número válido.";
        }
        return ""; 
    }

    public static function validarRxUsoOd($valor) {
        if (empty(trim($valor))) {
            return "El campo OD es obligatorio.";
        }
        return "";
    }

    public static function validarRxUsoOi($valor) {
        if (empty(trim($valor))) {
            return "El campo OI es obligatorio.";
        }
        return ""; 
    }
}

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$edad = isset($_POST['edad']) ? $_POST['edad'] : "";
$avEOd = isset($_POST['avEOd']) ? $_POST['avEOd'] : "";
$avEOi = isset($_POST['avEOi']) ? $_POST['avEOi'] : "";
$nombreError = ValidacionesConsulta::validarNombre($nombre);
$edadError = ValidacionesConsulta::validarEdad($edad);
$avError = ValidacionesConsulta::validarAgudezaVisual($avEOd, $avEOi);
if (!empty($nombreError) || !empty($edadError) || !empty($avError)) {
    $errorMessages = array_filter([$nombreError, $edadError, $avError]);
    $errorMessage = implode("<br>", $errorMessages); 
    header("Location: consulta.php?error=" . urlencode($errorMessage));
    exit();
}

