<?php
namespace App\Modelos;

require_once 'Conexion.php';
use App\Modelos\Conexion;

class Clientespop
{
    // Other methods and properties

    public function getUsersWithRoleTwo()
    {
        $connection = new Conexion();
        $pdo = $connection->obtenerConexion(); // Use obtenerConexion() method

        $query = "SELECT u.id, u.nombre, u.apellido, u.email
                FROM Usuarios u
                INNER JOIN roles r ON u.id_rol = r.id_rol
                WHERE u.id_rol = 2";

        $stmt = $pdo->query($query);

        $users = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = $row;
        }

        return $users;
    }
}
?>

