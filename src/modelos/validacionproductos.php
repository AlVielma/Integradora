<?php
namespace App\Modelos;
require __DIR__.'/../../vendor/autoload.php';

class validacionproductos
{
    function nulo(array $formulario)
    {
        foreach ($formulario as $form) 
        {
            if(strlen(trim($form))<1)
            {
                return true;
            }
        }
        return false;
    }

    public function validarExtensionImagen($imagen)
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $pathinfo = pathinfo($imagen['name']);

        // Verificar si la variable $pathinfo es un array y contiene la clave 'extension'
        if (is_array($pathinfo) && isset($pathinfo['extension'])) {
            $extension = strtolower($pathinfo['extension']);
            return in_array($extension, $allowedExtensions);
        }

        // Si $pathinfo no es un array o no contiene la clave 'extension', retornar falso
        return false;
    }

    function mensajes(array $errors)
    {
        if(count($errors) > 0){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><ul>';
        foreach($errors as $error){
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        }
    }
}
