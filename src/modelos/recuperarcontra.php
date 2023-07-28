<?php
namespace App\Modelos;

use App\Modelos\Conexion;
use PDO;
require_once 'Conexion.php';
use \Exception;

class RecuperarContra
{
    private $conn;

    public function __construct()
    {
        // Crear una instancia de la clase de conexión
        $conexion = new Conexion();
        $this->conn = $conexion->conectar();
    }

    public function obtenerIdUsuarioPorEmail($email)
    {
        // Verifica que el correo electrónico no esté vacío
        if (empty($email)) {
            return false;
        }

        try {
            // Realiza la consulta en la base de datos para obtener el ID del usuario
            $stmt = $this->conn->prepare("SELECT id FROM Usuarios WHERE email = ?");
            $stmt->bindValue(1, $email, PDO::PARAM_STR);
            $stmt->execute();

            // Obtiene la fila del resultado
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si se encontró el usuario, devuelve su ID, de lo contrario, devuelve false
            return $row ? $row['id'] : false;
        } catch (Exception $e) {
            // Mostrar el mensaje completo de la excepción
            echo "Error al obtener el ID del usuario: " . $e->getMessage();
            return false;
        }
    }

    // Método para cambiar la contraseña
    public function cambiarContraseña($idUsuario, $contraseñaNueva)
    {
        try {
            // Verifica que la contraseña nueva no esté vacía
            if (empty($contraseñaNueva)) {
                return false;
            }

            // Verifica que el ID de usuario sea válido
            if (!is_int($idUsuario) || $idUsuario <= 0) {
                return false;
            }

            // Genera el hash de la nueva contraseña
            $ContraseñaNueva = password_hash($contraseñaNueva, PASSWORD_DEFAULT);

            // Actualiza la contraseña en la base de datos
            $stmt = $this->conn->prepare("UPDATE Usuarios SET contraseña = ? WHERE id = ?");
            $stmt->bindValue(1, $ContraseñaNueva, PDO::PARAM_STR);
            $stmt->bindValue(2, $idUsuario, PDO::PARAM_INT);
            $result = $stmt->execute();

            if ($result) {
                // La contraseña se cambió exitosamente
                return true;
            } else {
                // Hubo un error al cambiar la contraseña
                return false;
            }
        } catch (Exception $e) {
            // Mostrar el mensaje completo de la excepción
            echo "Error al cambiar la contraseña: " . $e->getMessage();
            return false;
        }
    }
}
?>
