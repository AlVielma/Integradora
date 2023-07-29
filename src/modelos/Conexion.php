<?php
namespace App\Modelos;

class Conexion
{
    private $hostname="3.144.222.114";
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