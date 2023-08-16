<?php
namespace App\Modelos;
require_once 'Conexion.php';
use App\Modelos\Conexion;
/*Clientepop.php*/
class Clientespop
{
    public function activarUsuario($id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->obtenerConexion();

        $query = "UPDATE Usuarios SET estado_id = 5 ,estatus=1 WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function desactivarUsuario($id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->obtenerConexion();

        $query = "UPDATE Usuarios SET estado_id = 1, estatus=0  WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    

    public function obtenerUsuariosConEstado()
{
    $conexion = new Conexion();
    $pdo = $conexion->obtenerConexion();
    $query = "SELECT
        u.id,
        u.nombre,
        u.apellido,
        u.email,
        IF(u.estado_id = 5, 'Activo', 'Inactivo') AS estado
        FROM
        Usuarios u
        INNER JOIN
        roles r ON u.id_rol = r.id_rol
        WHERE
        r.id_rol = 2";
        $stmt = $pdo->query($query);
        $usuarios = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        $usuarios[] = $row;
    }

    return $usuarios;
}

public function buscarClientesPorNombreApellido($busqueda)
{
    $conexion = new Conexion();
    $pdo = $conexion->obtenerConexion();

    $query = "CALL BuscarClientesPorNombreApellido(:busqueda)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':busqueda', $busqueda, \PDO::PARAM_STR);
    $stmt->execute();

    $clientes = [];
    while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        $clientes[] = $row;
    }
    return $clientes;
}

function mensajes(array $act)
    {
        if(count($act) > 0){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><ul>';
        foreach($act as $act){
            echo '<li>' . $act . '</li>';
        }
        echo '</ul>';
        }
    }
}
?>
