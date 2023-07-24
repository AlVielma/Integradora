<?php

namespace App\Modelos;
require __DIR__ . '/../../vendor/autoload.php';
use App\Modelos\Conexion;
use PDO;

function buscarProductos($busqueda, $orden = '')
{
    $conexion = new Conexion();
    $con = $conexion->conectar();

    $rutaBaseImagenes = '../productosimg/';

    $consulta = $con->prepare("CALL BuscadorPro(?);");
    $consulta->execute([$busqueda]);

    $product = $consulta->fetchAll(PDO::FETCH_OBJ);
    $consulta->closeCursor();

    if ($orden === 'mayor_menor') {
        usort($product, function ($a, $b) {
            return $b->precio - $a->precio;
        });
    } elseif ($orden === 'menor_mayor') {
        usort($product, function ($a, $b) {
            return $a->precio - $b->precio;
        });
    }

    return $product;
}
