<?php

namespace App\Modelos;
class validacionesRegistrar{

    
    /* longitud cadena y quita espacios en blanco*/
    /*true = uno esta vacio */
    private function sanitizar($parametro) {
        $parametro = trim($parametro);
        $parametro = htmlspecialchars($parametro, ENT_QUOTES, 'UTF-8');
        $parametro = str_replace(array(';', '--', '*', '%', '!', '=', '<', '>'), '', $parametro);
        $parametro = strip_tags($parametro);
    
        return $parametro;
    }
    
    function esNulo(array $parametros) {
        foreach ($parametros as $parametro) {
            $parametro = $this->sanitizar($parametro);
            if (strlen(trim($parametro)) < 1) {
                return true;
            }
        }
        return false;
    }

    /* Estructura correcta email */
    function esEmail($email){
        // Sanitizar el email antes de validar su estructura
        $email = $this->sanitizar($email);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    /*Validacion entre 2 string */
    function validarContr($password, $confpassword){
        $password = $this->sanitizar($password);
        $confpassword = $this->sanitizar($confpassword);
        if(strcmp($password, $confpassword) === 0){
            return true;
        }
        return false;
    }

    function registrarCliente(array $datos, $con)
    {
    foreach ($datos as $dato) {
        // Validar y sanitizar cada dato
        if ($this->sanitizar($dato) === false) {
            // Al menos uno de los datos contiene contenido no permitido
            return false;
        }
    }

    // Realizar más validaciones, si es necesario, para asegurar que los datos sean correctos
    // Por ejemplo, verificar si el email ya existe en la base de datos antes de insertar

    $sql = $con->prepare("INSERT INTO Usuarios (nombre, apellido, email, contraseña, id_rol) VALUES (?,?,?,?,2)");
    if ($sql->execute($datos)) {
        // La consulta se realizó con éxito
        return true;
    } else {
        // Ocurrió un error al ejecutar la consulta
        return false;
    }
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
    /*   
    function login($email, $password, $con) {
        try {
            $sql = $con->prepare("SELECT id, nombre, apellido, email, contraseña, id_rol FROM Usuarios WHERE email LIKE ? LIMIT 1");
            $sql->execute([$email]);
            $row = $sql->fetch(\PDO::FETCH_ASSOC);
    
            if ($row && password_verify($password, $row['contraseña'])) {
                // La contraseña es válida, se permite el inicio de sesión
    
                // Almacenar los datos del usuario en las variables de sesión
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_name'] = $row['nombre'];
                $_SESSION['user_lastname'] = $row['apellido'];
                $_SESSION['user_rol'] = $row['id_rol'];
    
                // Devolver true para indicar que el inicio de sesión fue exitoso
                return true;
            } else {
                // La contraseña no coincide o el usuario no fue encontrado
                // Devolver false para indicar que el inicio de sesión falló
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
        }
    }
    
    */ 
}
?>