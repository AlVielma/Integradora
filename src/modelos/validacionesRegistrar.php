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

    $sql = $con->prepare("INSERT INTO Usuarios (nombre, apellido, email, contraseña, id_rol, token, estado_id) VALUES (?,?,?,?,2,?,?)");
    if ($sql->execute($datos)) {
        // La consulta se realizó con éxito
        return true;
    } else {
        // Ocurrió un error al ejecutar la consulta
        return false;
    }


    }
    /*public function verificarToken($email, $token, $con)
    {
        // Implementa la lógica para verificar el token en la base de datos
        // Puedes usar una consulta SQL para buscar el token correspondiente al correo electrónico dado
        // Si el token existe y es válido, devuelve true, de lo contrario, devuelve false
        // Ejemplo (asumiendo que existe una tabla "Usuarios" con una columna "token"):
        $sql = $con->prepare("SELECT * FROM USUARIOS WHERE email =? AND token = ?;");
        $sql->execute([$email, $token]);
        $sql->fetchColumn();
        return $sql > 0;
    }*/

    
    public function verificarToken($email, $token, $con)
        {
            // Implementa la lógica para verificar el token en la base de datos
            // Puedes usar una consulta SQL para buscar el token correspondiente al correo electrónico dado
            // Si el token existe y es válido, devuelve true, de lo contrario, devuelve false
            // Ejemplo (asumiendo que existe una tabla "Usuarios" con una columna "token"):
            $sql = $con->prepare("SELECT * FROM Usuarios WHERE email =? AND token = ?;");
            $sql->execute([$email, $token]);
            return $sql;
        }

    public function actualizarEstadoUsuario($email, $status, $estado_id, $con)
    {
        // Desactivar el safe update mode temporalmente
           // $con->query("SET SQL_SAFE_UPDATES = 0");
        
        // Implementa la lógica para actualizar el estado del usuario en la base de datos
        // Puedes usar una consulta SQL para actualizar el estado del usuario correspondiente al correo electrónico dado
        // Ejemplo (asumiendo que existe una tabla "Usuarios" con una columna "estado_id"):
        $sql = $con->prepare("UPDATE Usuarios SET  estado_id = ?, status =? WHERE email = ?");
        $sql->execute([$estado_id, $status, $email]);
        return $sql->rowCount() > 0;

          // Volver a activar el safe update mode
        //$con->query("SET SQL_SAFE_UPDATES = 1");

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


    public function mostrarMensajes(array $errors) {
        if (count($errors) > 0) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><ul>';
            foreach ($errors as $error) {
                echo '<li>' . htmlspecialchars($error) . '</li>';
            }
            echo '</ul></div>';
        }
    }
    function filtrarString($string)
    {
        return filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_ENCODE_HIGH);
    }

    function sqlinj($string)
    {
        $parametro = str_replace(array(';', '--', '*', '%', '!', '=', '<', '>'), '', $string);
        return $parametro;
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