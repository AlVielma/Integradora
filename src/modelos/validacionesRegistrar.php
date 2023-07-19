<?php

namespace App\Modelos;
class validacionesRegistrar{

    /* longitud cadena y quita espacios en blanco*/
    /*true = uno esta vacio */
    function esNulo(array $parametros){
        foreach($parametros as $parametro){
            if(strlen(trim($parametro)) < 1){
                return true;
            }
        }
        return false;
    }

    /* Estructura correcta email*/
    function esEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    /*Validacion entre 2 string */
    function validarContr($password, $confpassword){
        if(strcmp($password, $confpassword) === 0){
            return true;
        }
        return false;
    }

    function registrarCliente(array $datos, $con)
    {
        $sql = $con->prepare("INSERT INTO Usuarios (nombre, apellido, email, contraseña, id_rol) VALUES (?,?,?,?,2)");
        if($sql->execute($datos));
    }

    function usuarioExist($usuario, $con)
    {
        $sql = $con->prepare("SELECT id FROM Usuarios WHERE nombre LIKE ? LIMIT 1");
        $sql->execute([$usuario]);
        if($sql->fetchColumn() > 0){
            return true;
        }
        return false;
    }

    function emailExist($email, $con)
    {
        $sql = $con->prepare("SELECT id FROM Usuarios WHERE email LIKE ? LIMIT 1");
        $sql->execute([$email]);
        if($sql->fetchColumn() > 0){
            return true;
        }
        return false;
    }

    function mostrarMensajes(array $errors)
    {
        if(count($errors) > 0){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><ul>';
        foreach($errors as $error){
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        }
    }
}
?>