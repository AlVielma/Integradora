<?php

namespace App\Modelos;

use PDO;

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
        }
    }

    function login($email, $password, $con) {
        try {
            $sql = $con->prepare("SELECT id, email, contraseña, id_rol FROM Usuarios WHERE email LIKE ? LIMIT 1");
            $sql->execute([$email]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
    
            if ($row && password_verify($password, $row['contraseña'])) {
                // La contraseña es válida, se permite el inicio de sesión
    
                // Almacenar el rol del usuario en una variable
                $id_rol = $row['id_rol'];
    
                // Redireccionar según el rol del usuario
                if ($id_rol == 1) {
                    // Si es admin, redirigir a la vista de admin
                    header("Location: ../admin/app/aggimg.php");
                } else {
                    // Si es usuario, redirigir a la vista de usuario
                    header("Location: ../index.php");
                }
                exit;
            } else {
                // La contraseña no coincide, no se permite el inicio de sesión
                return 'La contraseña no coincide';
            }
        } catch (\PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
        }
    }
    
    

    
}
?>