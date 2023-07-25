<?php
namespace App\Modelos;

class Conexion
{
<<<<<<< HEAD
    private $hostname="3.17.154.192";
=======
    private $hostname="3.144.30.234";
>>>>>>> 0688d6f575d81f312fdb88f32fe77fc2f05dc5da
    private $database="optica_bd_borrador1";
    private $user="vielma";
    private $password="123";
    private $charset="utf8";

    public function conectar()
    {
        try{
            //$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
            $conexion = "mysql:host=".$this->hostname.";dbname=".$this->database.";charset=".$this->charset;
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_EMULATE_PREPARES=>false
            ];
            $pdo = new \PDO($conexion,$this->user,$this->password,$options);

            return $pdo;
        }
        catch(\PDOException $e)
        {
            echo 'Error conexion'.$e->getMessage();
            exit;
        }
    }
    
    public function obtenerConexion()
    {
        return $this->conectar();
    }
}