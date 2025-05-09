<?php
// filepath: c:\xampp\htdocs\logout.php
session_start();
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión actual
header("Location: ../vistas/iniciarSesion.html"); // Redirige al formulario de inicio de sesión
exit();
?>