<?php
namespace App\Modelos;
use App\Modelos\Conexion;
require_once 'Conexion.php';
require __DIR__.'/../../vendor/autoload.php';
/*trabajador.php*/
class Trabajador
{
    private $connect;
    private $conectar;
    public function __construct()
    {
        $this->connect = new Conexion();
        $this->conectar = $this->connect->conectar();
    }
    
    public function mostrar()
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
        r.id_rol = 1";
    $stmt = $pdo->query($query);
    $usuarios = [];
    while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        $usuarios[] = $row;
    }
    return $usuarios;
}

    private function sanitizar($parametro) {
        $parametro = trim($parametro);
        $parametro = htmlspecialchars($parametro, ENT_QUOTES, 'UTF-8');
        $parametro = str_replace(array(';', '--', '*', '%', '!', '=', '<', '>'), '', $parametro);
        $parametro = strip_tags($parametro);
    
        return $parametro;
    }
    function esNulo(array $parametros) {
        foreach ($parametros as $parametro) {
            $parametro = $this->sanitizar($parametro);
            if (strlen(trim($parametro)) < 1) {
                return true;
            }
        }
        return false;
    }
    public function agregar($nombre, $apellido, $email, $contraseña, $id_rol)
    {
        $nombre = $this->sanitizar($nombre);
        $apellido = $this->sanitizar($apellido);
        $email = $this->sanitizar($email);
        $contraseña = $this->sanitizar($contraseña);
        $id_rol = $this->sanitizar($id_rol);
        
        // Establecer valores predeterminados para estado_id y estatus
        $estado_id = 5; // Valor por defecto para estado_id
        $estatus = 1;   // Valor por defecto para estatus
        
        $query = $this->conectar->prepare("INSERT INTO Usuarios (nombre, apellido, email, contraseña, id_rol, estado_id, estatus, token) VALUES (?, ?, ?, ?, ?, ?, ?, NULL)");
        $query->execute([$nombre, $apellido, $email, $contraseña, $id_rol, $estado_id, $estatus]);
    }
    

    /*public function editar($id, $nombre, $apellido, $email, $contraseña, $id_rol)
    {
        $query = $this->conectar->prepare("UPDATE Usuarios SET nombre=?, apellido=?, email=?, contraseña=?, id_rol=? WHERE id=?");
        $query->execute([$nombre, $apellido, $email, $contraseña, $id_rol, $id]);
    }*/
    /*trabajador.php*/
        public function activarUsuario($id)
        {
            $conexion = new Conexion();
            $pdo = $conexion->obtenerConexion();
    
            $query = "UPDATE Usuarios SET estado_id = :estado_id, estatus= 1 WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $estado_id = 5; // Cambia el valor al estado activo correcto
            $stmt->bindParam(':estado_id', $estado_id, \PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
    
            try {
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } catch (\PDOException $e) {
                // Maneja la excepción (por ejemplo, loguea el error)
                return false;
            }
        }
    
        public function desactivarUsuario($id)
        {
            $conexion = new Conexion();
            $pdo = $conexion->obtenerConexion();
    
            $query = "UPDATE Usuarios SET estado_id = :estado_id, estatus = 0 WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $estado_id = 1; // Cambia el valor al estado inactivo correcto
            $stmt->bindParam(':estado_id', $estado_id, \PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
    
            try {
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } catch (\PDOException $e) {
                // Maneja la excepción (por ejemplo, loguea el error)
                return false;
            }
        }


    public function cerrar()
    {
        $this->conectar = null;
    }

    public function __destruct()
    {
        $this->conectar = null; // Cierra la conexión establecida
    }
}
