<?php

include "funcionesUsuarios.php";

$opt = filter_input(INPUT_POST, 'opt', FILTER_SANITIZE_NUMBER_INT);
$users = new funcionesUsuarios();
session_start();

switch ($opt) {
    case 1:
        /* include "../../security/sec.php"; */
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $auto = filter_input(INPUT_POST, 'autoLogin', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $users-> crearUser($user, $pass, $nombre, $auto);
        if(empty($user) || empty($pass)){
            ?>
            <script>
                alert("El usuario y/o la contraseña no pueden estar en blanco");
                window.location.href= "../../vistas/iniciarSesion.html";
            </script>
            <?php
            break;
        }
        header("Location: ../../index.php");
        break;
    
}
?>