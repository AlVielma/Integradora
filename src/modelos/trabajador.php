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
    private function sanitizar($parametro){
    $parametro = htmlspecialchars($parametro, ENT_QUOTES, 'UTF-8');
    $parametro = filter_var($parametro, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_ENCODE_LOW | FILTER_FLAG_ENCODE_HIGH);
    $parametro = trim($parametro);
    $parametro = filter_var($parametro, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_ENCODE_HIGH);
    $parametro = str_replace(array(';', '--', '*', '%', '!', '=', '<', '>'), '', $parametro);
    if (preg_match('/<.*>|SELECT|UPDATE|DELETE|INSERT|CREATE|DROP|ALTER/i', $parametro)) {
        return false;
    }
    $parametro = filter_var($parametro, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND | FILTER_FLAG_ALLOW_SCIENTIFIC);
    return $parametro;}
    public function agregar($nombre, $apellido, $email, $contraseña, $id_rol)
    { $nombre = $this->sanitizar($nombre);
        $apellido = $this->sanitizar($apellido);
        $email = $this->sanitizar($email);
        $contraseña = $this->sanitizar($contraseña);
        $id_rol = $this->sanitizar($id_rol);
        $query = $this->conectar->prepare("INSERT INTO Usuarios (nombre, apellido, email, contraseña, id_rol) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$nombre, $apellido, $email, $contraseña, $id_rol]);
    }

    /*public function editar($id, $nombre, $apellido, $email, $contraseña, $id_rol)
    {
        $query = $this->conectar->prepare("UPDATE Usuarios SET nombre=?, apellido=?, email=?, contraseña=?, id_rol=? WHERE id=?");
        $query->execute([$nombre, $apellido, $email, $contraseña, $id_rol, $id]);
    }*/

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
