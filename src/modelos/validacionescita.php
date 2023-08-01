<?php
namespace App\Modelos;
require __DIR__.'/../../vendor/autoload.php';
class validacionescita
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

    function caractmas($nombre)
    {
        if(strlen(trim($nombre))>50)
        {
            return true;
        }
        return false;
    }
    function numero($numero)
    {
        if(strlen(trim($numero))>10)
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


    function issnumber($numero)
    {
        if(is_numeric($numero))
        {
            return true;
        }
        return false;
    }
    function filtrarString($string)
    {
        return filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_ENCODE_HIGH);
    }
}
