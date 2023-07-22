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

    function validarExtensionImagen($imagen)
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $pathinfo = pathinfo($imagen['name']);
        $extension = strtolower($pathinfo['extension']);
        return in_array($extension, $allowedExtensions);
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
