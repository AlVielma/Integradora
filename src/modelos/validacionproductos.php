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

    function esimg($file_type)
    {
        $allowed_types = array('image/jpeg','image/png');

        if(in_array($file_type,$allowed_types))
        {
            return true;
        }
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
