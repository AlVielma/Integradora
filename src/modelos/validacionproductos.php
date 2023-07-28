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
    function issnumber($numero)
    {
        if(is_numeric($numero))
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
    function caractmas($nombre)
    {
        if(strlen(trim($nombre))>100)
        {
            return true;
        }
        return false;
    }
    function sqlinj($string)
    {
        $parametro = str_replace(array(';', '--', '*', '%', '!', '=', '<', '>'), '', $string);
        return $parametro;
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
    
    function filtrarString($string)
    {
        return filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_ENCODE_HIGH);
    }
    
}
