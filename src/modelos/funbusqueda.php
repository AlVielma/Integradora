<?php

namespace App\Modelos;

require __DIR__.'/../../vendor/autoload.php';

class busque{

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