<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Finalizar la sesión
session_destroy();

// Redirigir al inicio o a cualquier otra página deseada después del cierre de sesión
header("Location: ../../pages/login.php");
exit;
?>