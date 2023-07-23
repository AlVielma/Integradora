<?php
namespace App\Modelos;

class ValidacionesReceta {
    public static function validarNombre($nombre) {
        if (empty(trim($nombre))) {
            return "El nombre del paciente es obligatorio.";
        }
        return ""; 
    }

    public static function validarEdad($edad) {
        if (empty($edad) || !is_numeric($edad)) {
            return "La edad debe ser un número válido.";
        }
        return ""; 
    }

    public static function validarMaterial($material) {
        if (empty(trim($material))) {
            return "El campo Material es obligatorio.";
        }
        return ""; 
    }

    public static function validarArmazon($armazon) {
        if (empty(trim($armazon))) {
            return "El campo Armazón es obligatorio.";
        }
        return ""; 
    }

    public static function validarPlasticos($plasticos) {
        if (empty(trim($plasticos))) {
            return "El campo Plásticos es obligatorio.";
        }
        return ""; 
    }

    public static function validarTotalPedido($totalPedido) {
        if (empty(trim($totalPedido)) || !is_numeric($totalPedido)) {
            return "El Total de Pedido debe ser un número válido.";
        }
        return ""; 
    }
}
?>
