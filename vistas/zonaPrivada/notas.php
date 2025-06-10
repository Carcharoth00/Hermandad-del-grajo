<!DOCTYPE html>
<?php
session_start();

include "../../security/sec.php";
if (isset($_SESSION["log"])) { //Si existe la variable sesion log
    if ($_SESSION["log"] == false) { // Si no estamos logeados, entramos a logear
        include "../security/sec.php";
    }
} else {
    header("Location: ../iniciarSesion.html");
}
include "../../controladores/conexionBBDD.php";

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos/notas.css">
    <link rel="stylesheet" href="../../estilos/generales/nav-bar.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../estilos/generales/modal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Metamorphous&display=swap" rel="stylesheet">
    <title>Notas</title>
</head>

<body>
    <div class="nav-bar nav-desktop" id="nav-bar">
        <a href="../../security/logout.php"><img class="nav-bar-logo"
                src="../../imagenes/nav-bar/hermandad-del-grajo-foto.png"></a>
                <a class="nav-bar-texto" href="../privado.php">ZONA PRIVADA</a>
        <?php if (isset($_SESSION["log"]) && $_SESSION["log"] == 1): ?>
            <a class="nav-bar-texto"
                href="../../security/logout.php"><?php echo htmlspecialchars($_SESSION["nombre"]) . " - Cerrar sesión"; ?></a>
        <?php else: ?>
            <a class="nav-bar-texto nav-desktop" href="../../vistas/iniciarSesion.html">Iniciar sesión</a>
        <?php endif; ?>
    </div>
    <nav class="nav-mobile" id="nav-mobile">
        <input type="checkbox" id="menu" style="display:none;">
        <label for="menu" class="menu-icon">☰</label>
        <ul>
            <li><a class="nav-bar-texto" href="../privado.php">ZONA PRIVADA</a></li>
            <?php if (isset($_SESSION["log"]) && $_SESSION["log"] == 1): ?>
                <li><a class="nav-bar-texto"
                    href="../../security/logout.php"><?php echo htmlspecialchars($_SESSION["nombre"]) . " - Cerrar sesión"; ?></a></li>
            <?php else: ?>
               </li> <a class="nav-bar-texto" href="../../vistas/iniciarSesion.html">Iniciar sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section class="layout">
        <div class="listado">
            <p class="nuevaNota guardar-btn">Crear nota</p>
            <?php
            $filt = $con->prepare("SELECT * FROM notas_" . $_SESSION['id']);
            $filt->execute();
            $res = $filt->get_result();
            for ($i = 0; $i < $res->num_rows; $i++) {
                $fila = $res->fetch_assoc();
                ?>
                <p class="nombreListaNotas" idNota="<?php echo $fila['ID_nota'] ?>">➜ <?php echo $fila['Nombre_nota'] ?></p>
                <img src="../../imagenes/iconos/borrar.png" style="width: 30px; height: 30px; text-align:right;"
                    class="borrarNota" id="borrar_<?php echo $fila['ID_nota'] ?>">
                <?php
            }
            ?>
        </div>
        <div class="cuerpo"></div>

    </section>
</body>
<script>
    $(document).ready(function () {
        $(".nombreListaNotas").click(function () {
            let idNota = $(this).attr("idNota");
            $.ajax({
                type: "post",
                url: "cuerpoNotas.php",
                data: {
                    idNota: idNota
                },
                success: function (data) {
                    $(".cuerpo").html(data);
                }
            })
        });

        $(".nuevaNota").click(function () {
            let opt = 1;
            $.ajax({
                type: "post",
                url: "../../controladores/controladoresNotas/controladorNotas.php",
                data: {
                    opt: opt,
                },
                success: function (data) {
                    $(".cuerpo").html(data);
                }
            });
            setTimeout(function () {
                location.reload(true);
            }, 1500);
        });

        $(".borrarNota").click(function () {
            let opt = 2;
            let idNota = $(this).attr("id");
            $.ajax({
                type: "post",
                url: "../../controladores/controladoresNotas/controladorNotas.php",
                data: {
                    opt: opt,
                    idNota: idNota
                }
            });
            setTimeout(function () {
                location.reload(true);
            }, 1500);
        });

    });
</script>

</html>