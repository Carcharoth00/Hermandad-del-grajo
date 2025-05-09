<?php
/* session_start(); */

if (!isset($_SESSION["log"])) {
    $_SESSION["log"] = 0; // Valor predeterminado
}

if ($_SESSION["log"] == 0) {
    $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);//Vienen del formulario
    $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS); //Vienen del formulario
    $resLog = login($user, $pass);

    if ($resLog == 1) {
        $_SESSION["log"] = 1;
    } else if ($resLog == 0) {
        $_SESSION["log"] = 0;
        header("Location: ../vistas/iniciarSesion.html?ev=0");
        exit();
    } elseif ($resLog == 2) {
        header("Location: ./vistas/iniciarSesion.html?ev=2");
        exit();
    }


}

function login($user, $pass)
{
    include $_SERVER['DOCUMENT_ROOT'] . "/controladores/conexionBBDD.php";

    $filt = $con->prepare("SELECT * FROM usuarios where Usuario = ? AND Pass = ?"); //Hace la consulta
    $filt->bind_param('ss', $user, $pass); //Pilla los $_Post para que entren en el formulario
    $filt->execute(); //Ejecuta la consulta

    $res = $filt->get_result(); //Capturas los resultados de la consulta
    $resultados = $res->fetch_assoc();//convierte los resultados en un array

    if (!is_array($resultados)) {
        return 0;
    } /* else if ($resultados['Actividad'] == 0) {
        return 2;
    } */

    $_SESSION["user"] = $resultados['Usuario'];
    $_SESSION["nombre"] = $resultados['Nombre'];
    $_SESSION['poder'] = $resultados['Nivel'];
    $_SESSION["id"] = $resultados["ID"];
    return 1;

}

?>