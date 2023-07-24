<?php
// archivo: ValidacionesConsulta.php
namespace App\Modelos;
class ValidacionesConsultas {
    // Validar nombre
    public function validarNombre(string $nombre): string {
        if (empty(trim($nombre))) {
            return "El nombre es obligatorio.";
        }
        return ""; 
    }

    // Validar edad
    public function validarEdad($edad){
        if (empty($edad) || !is_numeric($edad)) {
            return "La edad debe ser un número válido.";
        }

        if ($edad < 6) {
            return "La edad debe ser mayor o igual a 6.";
        }

        return ""; 
    }

    // Validar Rx Uso OD
    public function validarRxUsoOd(float $valor): string {
        if (empty(trim($valor))) {
            return "El campo OD es obligatorio.";
        }
        return "";
    }

    // Validar Rx Uso OI
    public function validarRxUsoOi(float $valor): string {
        if (empty(trim($valor))) {
            return "El campo OI es obligatorio.";
        }
        return ""; 
    }

    // Función para realizar todas las validaciones y retornar mensajes de error
    public function validarFormulario(array $datos): array {
        $errores = [];

        $nombreError = $this->validarNombre($datos['nombre']);
        $edadError = $this->validarEdad($datos['edad']);
        $avEOdError = $this->validarRxUsoOd($datos['avEOd']);
        $avEOiError = $this->validarRxUsoOi($datos['avEOi']);

        if (!empty($nombreError)) {
            $errores['nombre'] = $nombreError;
        }

        if (!empty($edadError)) {
            $errores['edad'] = $edadError;
        }

        if (!empty($avEOdError)) {
            $errores['avEOd'] = $avEOdError;
        }

        if (!empty($avEOiError)) {
            $errores['avEOi'] = $avEOiError;
        }

        return $errores;
    }
}

