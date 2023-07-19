<?php

function registrarCliente(array $datos, $con)
{
    $sql = $con->prepare("INSERT INTO Usuarios (nombre, apellido, email, contraseña, id_rol) VALUES (?,?,?,?,2)");
    if($sql->execute($datos)){
        return $con->lastInsertId();
    }
    return 0;
}