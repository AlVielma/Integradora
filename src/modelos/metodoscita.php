<?php
namespace App\Modelos;
use App\Modelos\Conexion;
require_once 'Conexion.php';
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
        $consulta = $this->conectar->query("SELECT cc.id,cc.nombre, u.apellido, cc.telefono,u.email ,cc.fecha_nacimiento
        ,cc.dia,cc.hora,cc.sintomas_oculares,cc.enfermedades_oculares,cc.lentes_actualmente,cc.armazon,cc.contacto,
        cc.ultimo_examen,cc.uso_gotas,cc.activo FROM Citas_Cliente cc inner join Usuarios u on u.id = cc.usuario WHERE activo=2");
        return $consulta->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function agregar($sesion,$nombre,$telefono,$fecha_nacimiento,$dia,$hora,$sintomas_oculares,$enfermedades_oculares,$lentes_actualmente,$armazon,$contacto,$ultimo_examen
    ,$uso_gotas)
    {
        $query = $this->conectar->prepare("INSERT INTO Citas_Cliente (usuario,nombre, telefono, fecha_nacimiento, dia, hora, 
        sintomas_oculares, enfermedades_oculares, lentes_actualmente, armazon, contacto, ultimo_examen, uso_gotas,activo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,2)");
         $ultimo_examen = empty($ultimo_examen) ? null : $ultimo_examen;
        $query->execute([$sesion,$nombre,$telefono,$fecha_nacimiento,$dia,$hora,$sintomas_oculares,$enfermedades_oculares,$lentes_actualmente,$armazon,$contacto,$ultimo_examen
        ,$uso_gotas]);
    }

    
    public function eliminar($id)
    {
        $query=$this->conectar->prepare("UPDATE Citas_Cliente SET activo=4 WHERE id=?");
        $query->execute([$id]);
    }
    public function verificarSesion()
    {
        session_start();
        return isset($_SESSION['usuario']); // Verificar si el usuario ha iniciado sesión
    }

    public function verificarcitas($dia,$hora)
    {
        $query = $this->conectar->prepare("SELECT * FROM Citas_Cliente WHERE dia=? AND hora=? AND activo=2");
        $query->execute([$dia, $hora]);
        return $query;
    }
    public function hecho($id)
    {
        $query = $this->conectar->prepare("UPDATE Citas_Cliente SET activo=3 WHERE id=?");
        $query->execute([$id]);
    }

    public function __destruct()
    {
        $this->conectar = null; // Cierra la conexión establecida
    }

}