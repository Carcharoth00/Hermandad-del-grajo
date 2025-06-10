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
    <div class="nav-bar nav-desktop" id="nav-bar">
        <a href="../security/logout.php"><img class="nav-bar-logo"
                src="../imagenes/nav-bar/hermandad-del-grajo-foto.png"></a>
        <?php if (isset($_SESSION["log"]) && $_SESSION["log"] == 1): ?>
            <a class="nav-bar-texto-users"
                href="../security/logout.php"><?php echo htmlspecialchars($_SESSION["nombre"]) . " - Cerrar sesión"; ?></a>
        <?php else: ?>
            <a class="nav-bar-texto-users nav-desktop" href="../vistas/iniciarSesion.html">Iniciar sesión</a>
        <?php endif; ?>
    </div>
    <nav class="nav-mobile" id="nav-mobile">
        <input type="checkbox" id="menu" style="display:none;">
        <label for="menu" class="menu-icon">☰</label>
        <ul>
            <?php if (isset($_SESSION["log"]) && $_SESSION["log"] == 1): ?>
                <li><a class="nav-bar-texto-users"
                    href="../security/logout.php"><?php echo htmlspecialchars($_SESSION["nombre"]) . " - Cerrar sesión"; ?></a></li>
            <?php else: ?>
               </li> <a class="nav-bar-texto-users" href="../vistas/iniciarSesion.html">Iniciar sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="contenedor-flotantes">
        <div class="flotante">
            <a href="./zonaPrivada/notas.php"><img src="../imagenes/privado/icono-notas.png" alt="notas logo"></a>
            <p>Tus notas</p>
        </div>
        <div class="flotante">
            <a href="./zonaPrivada/ficha.php"><img src="../imagenes/privado/icono-ficha.png" alt="fichas logo"></a>
            <p>Ficha</p>
        </div>
    </div>

    <!-- <div class="tituloPersonal">
        <h1>Bienvenido <?php /* echo $_SESSION["nombre"]*/ ?></h1>
    </div> -->
    <script src="../scripts/generales/nav-bar.js"></script>
</body>

</html>