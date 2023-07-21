<?php

namespace App\Modelos;

class Usuario {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function login($email, $password) {
        try {
            $sql = $this->conexion->prepare("SELECT * FROM Usuarios WHERE email LIKE ? LIMIT 1");
            $sql->execute([$email]);
            $row = $sql->fetch(\PDO::FETCH_ASSOC);

            if ($row && password_verify($password, $row['contraseña'])) {
                // La contraseña es válida, inicio de sesión exitoso
                return $row;
            } else {
                // La contraseña no coincide o el usuario no fue encontrado
                return null;
            }
        } catch (\PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return null;
        }
    }
}
