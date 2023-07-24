<?php
namespace App\Modelos;

class ValidacionesReceta {
    

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
    
    function mayor6($edad)
    {
        if($edad>6)
        {
            return true;
        }
        return false;
    }
    function msj(array $errors)
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
?>
