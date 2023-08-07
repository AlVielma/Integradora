<?php

namespace App\Modelos;
require_once 'Conexion.php';
use App\Modelos\Conexion;
require __DIR__.'/../../vendor/autoload.php';

class busque{
    private $conexion;
    private $pdo;

    public function __construct() 
    {
        $this->conexion = new Conexion();
        $this->pdo = $this->conexion->conectar();
    }

    public function buscar()
    {

    }

    public function ordenar($orden, $pop)
    {

        if ($orden === 'mayor_menor') {
            usort($pop, function ($a, $b) {
                return $b['precio'] - $a['precio'];
            });
        } elseif ($orden === 'menor_mayor') {
            usort($pop, function ($a, $b) {
                return $a['precio'] - $b['precio'];
            });
        }

        return $pop;
    }
}