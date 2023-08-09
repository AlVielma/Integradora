<?php
namespace App\Modelos;

class validacionesUsuario
{
    //Sanitizar un parametro
    private function sanitizar($parametro)
    {
        return filter_var($parametro, FILTER_SANITIZE_SPECIAL_CHARS);
    }
    // Verificar si algún parámetro es nulo
    public function esNulo(array $parametros)
    {
        foreach ($parametros as $parametro) {
            $parametro = $this->sanitizar($parametro);
            if (strlen(trim($parametro)) < 1) {
                return true;
            }
        }
        return false;
    }

    // Validar longitud del email y contraseña
    public function validarLongitud($email, $password)
    {
        //Sanitizar los parametros antes de la validacion
        $email = $this->sanitizar($email);
        $password = $this->sanitizar($password);

        // Longitud mínima y máxima permitida para el email
        $minLongitudEmail = 5;
        $maxLongitudEmail = 100;
        
        // Longitud mínima y máxima permitida para la contraseña
        $minLongitudPassword = 3;
        $maxLongitudPassword = 20;

        // Verificar si el email y contraseña cumplen con las longitudes permitidas
        if (strlen($email) < $minLongitudEmail || strlen($email) > $maxLongitudEmail) {
            return false;
        }

        if (strlen($password) < $minLongitudPassword || strlen($password) > $maxLongitudPassword) {
            return false;
        }

        return true;
    }

    // Validar el formato del email utilizando la función filter_var
    public function validarFormatoEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    // Validar las credenciales del usuario en la base de datos
    public function validarCredenciales($email, $password, $con)
    {
         // Sanitizar los parámetros antes de la validación
         $email = $this->sanitizar($email);
         $password = $this->sanitizar($password);
        try {
            // Consultar la contraseña almacenada en la base de datos para el email proporcionado
            $sql = $con->prepare("SELECT contraseña FROM Usuarios WHERE email LIKE ? LIMIT 1");
            $sql->execute([$email]);
            $hashContraseña = $sql->fetchColumn();

            // Verificar si la contraseña es válida utilizando password_verify
            if (!$hashContraseña || !password_verify($password, $hashContraseña)) {
                return false;
            }

            return true;
        } catch (\PDOException $e) {
            // Manejar errores de consulta SQL
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }/*validacionesUusrio*/
    function verificarAccesoUsuario($estado_id, $estatus) {
        if ($estado_id == 1 && $estatus == 0) {
            return "No se permite el acceso.";
        } else {
            return true; // Se permite el acceso
        }
    }
    function verificarAccesoUsuarioEstado2($estado_id, $estatus) {
        if ($estado_id == 2 && $estatus == 0) {
            return "No se permite el acceso.";
        } else {
            return true; // Se permite el acceso
        }
    }
    
}

