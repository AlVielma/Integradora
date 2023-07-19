<?php
namespace App\Modelos;
use App\Modelos\Conexion;
require __DIR__ .'/../../vendor/autoload.php';



class metodoscita
{
    private $connect;
    private $conectar;
    public function __construct()
    {
        $this->connect= new Conexion();
        $this->conectar=$this->connect->conectar();
       
    }
    public function mostrar()
    {
        $consulta = $this->conectar->query("SELECT u.nombre, cc.nombre, cc.telefono, cc.fecha_nacimiento
        ,cc.dia,cc.hora,cc.sintomas_oculares,cc.enfermedades_oculares,cc.lentes_actualmente,cc.armazon,cc.contacto,
        cc.ultimo_examen,cc.uso_gotas FROM Citas_Cliente cc inner join Usuarios u on u.id = cc.usuario");
        return $consulta->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function agregar($nombre,$telefono,$fecha_nacimiento,$dia,$hora,$sintomas_oculares,$enfermedades_oculares,$lentes_actualmente,$armazon,$contacto,$ultimo_examen
    ,$uso_gotas)
    {
        $query = $this->conectar->prepare("INSERT INTO Citas_Cliente (nombre, telefono, fecha_nacimiento, dia, hora, 
        sintomas_oculares, enfermedades_oculares, lentes_actualmente, armazon, contacto, ultimo_examen, uso_gotas) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $query->execute([$nombre,$telefono,$fecha_nacimiento,$dia,$hora,$sintomas_oculares,$enfermedades_oculares,$lentes_actualmente,$armazon,$contacto,$ultimo_examen
        ,$uso_gotas]);
    }

    
    public function eliminar($id)
    {
        $query=$this->conectar->prepare("DELETE FROM Citas_Cliente WHERE id=?");
        $query->execute([$id]);
    }
    public function verificarSesion()
    {
        session_start();
        return isset($_SESSION['usuario']); // Verificar si el usuario ha iniciado sesión
    }

    public function __destruct()
    {
        $this->conectar = null; // Cierra la conexión establecida
    }

}