<?php

if(!empty($_POST['registro'])){
    if (empty($_POST['nombre']) or empty($_POST['apellido']) or empty($_POST['email']) or empty($_POST['password']) or empty($_POST['confpassword']) ) {
        echo 'Uno de los campos esta vacio';
    } else {
        # code...
    }
}