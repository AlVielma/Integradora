<?php
namespace App\Modelos;
use App\Modelos\Conexion;
require __DIR__.'/../../vendor/autoload.php';

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
        $consulta = $this->conectar->query("SELECT * FROM Usuarios WHERE id_rol = 1");
        return $consulta->fetchAll(\PDO::FETCH_ASSOC);
        
    }
    public function agregar($nombre, $apellido, $email, $contraseña, $id_rol)
    {
        // Primero, insertamos los datos en la tabla "usuarios" sin el id_roll
        $query = $this->conectar->prepare("INSERT INTO Usuarios (nombre, apellido, email, contraseña, id_rol) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$nombre, $apellido, $email, $contraseña, $id_rol]);
    }

    public function editar($id, $nombre, $apellido, $email, $contraseña, $id_rol)
    {
        $query = $this->conectar->prepare("UPDATE Usuarios SET nombre=?, apellido=?, email=?, contraseña=?, id_rol=? WHERE id=?");
        $query->execute([$nombre, $apellido, $email, $contraseña, $id_rol, $id]);
    }

    public function eliminar($id)
    {
        $query = $this->conectar->prepare("DELETE FROM Usuarios WHERE id=?");
        $query->execute([$id]);
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
