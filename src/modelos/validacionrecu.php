<?php

namespace App\Modelos;

class Validacionrecu
{
    // Función para sanitizar los datos
    private function sanitizar($parametro)
    {
        $parametro = trim($parametro);
        $parametro = htmlspecialchars($parametro, ENT_QUOTES, 'UTF-8');
        $parametro = str_replace(array(';', '--', '*', '%', '!', '=', '<', '>'), '', $parametro);
        $parametro = strip_tags($parametro);

        return $parametro;
    }

    // Validar estructura de un email
    public function esEmail($email)
    {
        // Sanitizar el email antes de validar su estructura
        $email = $this->sanitizar($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    // Validar si las contraseñas coinciden
    public function validarContraseña($password, $confirmPassword)
    {
        $password = $this->sanitizar($password);
        $confirmPassword = $this->sanitizar($confirmPassword);
        if (strcmp($password, $confirmPassword) === 0) {
            return true;
        }
        return false;
    }
}
?>
