<!DOCTYPE html>
<?php
session_start();
include "../security/sec.php";
if (isset($_SESSION["log"])) { //Si existe la variable sesion log
    if ($_SESSION["log"] == false) { // Si no estamos logeados, entramos a logear
        include "../security/sec.php";
    }
} else {
    header("Location: iniciarSesion.html");
}

include "../controladores/conexionBBDD.php";
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sección privada</title>
    <link rel="stylesheet" href="../estilos/privado.css">
    <link rel="stylesheet" href="../estilos/generales/nav-bar.css">
    <link rel="stylesheet" href="../estilos/generales/modal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Metamorphous&display=swap" rel="stylesheet">
</head>

<body>
    <div class="nav-bar" id="nav-bar">
        <a href="../index.html"><img class="nav-bar-logo" src="../imagenes/nav-bar/hermandad-del-grajo-foto.png"></a>
        <a class="nav-bar-texto" href="../index.html">INICIO</a>
        <a class="nav-bar-texto" href="../vistas/cronica.html">CRÓNICA</a>
        <a class="nav-bar-texto" href="../vistas/personajes.html">PERSONAJES</a>
        <a class="nav-bar-texto" href="../vistas/pnjs.html">PNJS</a>
        <?php if (isset($_SESSION["log"]) && $_SESSION["log"] == 1): ?>
            <a class="nav-bar-texto-users"
                href="../security/logout.php"><?php echo htmlspecialchars($_SESSION["nombre"]) . " - Cerrar sesión"; ?></a>
        <?php else: ?>
            <a class="nav-bar-texto-users" href="../vistas/iniciarSesion.html">Iniciar sesión</a>
        <?php endif; ?>
        <!--Hay que rehacer la barra de navegación para las necesidades de la parte privada. Y cada vez que vuelves a la web o cierra la sesión o hacer cookies si da tiempo. -->
    </div>

    <div class="contenedor-flotantes">
        <div class="flotante">
            <a href="./zonaPrivada/notas.php"><img src="../imagenes/privado/nota-adhesiva.png" alt="notas logo"></a>
            <p>Tus notas <?php echo $_SESSION['id'] ?></p>
        </div>
        <div class="flotante">
            <a href="./zonaPrivada/ficha.php"><img src="../imagenes/privado/notas.png" alt="fichas logo"></a>
            <p>Fichas</p>
        </div>
        <!-- <div class="flotante">
        <img src="../imagenes/flotante3.jpg" alt="Imagen 3">
        <p>Texto 3</p>
    </div> -->
    </div>

    <!-- <div class="tituloPersonal">
        <h1>Bienvenido <?php /* echo $_SESSION["nombre"]*/ ?></h1>
    </div> -->
    <script src="../scripts/generales/nav-bar.js"></script>
</body>

</html>