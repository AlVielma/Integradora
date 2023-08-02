<?php
namespace App\Modelos;
require_once 'Conexion.php';
use App\Modelos\Conexion;
$conexion = new Conexion();
$pdo = $conexion->obtenerConexion();
class Clientespop
{
    public function getUsuariosConRolDos()
    {
        $conexion = new Conexion();
        $pdo = $conexion->obtenerConexion();

        $query = "SELECT u.id, u.nombre, u.apellido, u.email, u.estado_id
                FROM Usuarios u
                INNER JOIN roles r ON u.id_rol = r.id_rol
                WHERE u.id_rol = 2";
        $stmt = $pdo->query($query);

        $usuarios = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $usuarios[] = $row;
        }

        return $usuarios;
    }

    
    public function buscarUsuariosConRolDos($busqueda)
    {
        $conexion = new Conexion();
        $pdo = $conexion->obtenerConexion();

        $query = "CALL BuscarUsuariosConRolDos(:busqueda)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':busqueda', $busqueda, \PDO::PARAM_STR);
        $stmt->execute();

        $usuarios = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $usuarios[] = $row;
        }

        return $usuarios;
    }
}
?>
