<?php

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

    function caractmas(array $formulario)
    {
        foreach($formulario as $form)
        {
            if(strlen(trim($form))>30)
            {
                return true;
            }
            return false;
        }
    }
}
