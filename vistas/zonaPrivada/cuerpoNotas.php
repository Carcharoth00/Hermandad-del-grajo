<!DOCTYPE html>
<?php
session_start();
include "../../security/sec.php";
include "../../controladores/conexionBBDD.php";
$idNota = filter_input(INPUT_POST, 'idNota', FILTER_SANITIZE_NUMBER_INT);

$filt = $con->prepare("SELECT * FROM notas_" . $_SESSION['id'] . " WHERE ID_nota = ? ");
$filt->bind_param('i', $idNota);
$filt->execute();
$res = $filt->get_result();
for ($i = 0; $i < $res->num_rows; $i++) {
    $fila = $res->fetch_assoc();
    ?>
    <div class="marco-notas">
        <label for="newNombreNota_<?php echo $fila['ID_nota'] ?>">Nombre de la nota:</label>
        <textarea data-laid="<?php echo $fila["ID_nota"] ?>" id="newNombreNota_<?php echo $fila['ID_nota'] ?>"
            class="nombreNota"><?php echo $fila['Nombre_nota'] ?></textarea>
        Cuerpo de la nota:    
        <textarea data-laid="<?php echo $fila["ID_nota"] ?>" id="newCuerpoNota_<?php echo $fila['ID_nota'] ?>"
            class="cuerpoNota"><?php echo $fila['Cuerpo_nota'] ?></textarea>
    </div>
    <?php
}
?>
<script>
    $(document).ready(function () {
        $(".nombreNota").change(function () {
            let ids = $(this).data("laid");
            let opt = 0;
            let nombreNota = $("#newNombreNota_" + ids).val();
            let cuerpoNota = $("#newCuerpoNota_" + ids).val();

            $.ajax({
                type: "post",
                url: "../../controladores/controladoresNotas/controladorNotas.php",
                data: {
                    ids: ids,
                    opt: opt,
                    nombreNota: nombreNota,
                    cuerpoNota: cuerpoNota,
                },
                success: function (response) {
                    console.log("Success:", response);
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                }
            });
            setTimeout(function () {
                location.reload(true);
            }, 1500);
        });

        $(".cuerpoNota").change(function () {
            let ids = $(this).data("laid");
            let opt = 0;
            let nombreNota = $("#nweNombreNota_" + ids).val();
            let cuerpoNota = $("#newCuerpoNota_" + ids).val();

            $.ajax({
                type: "post",
                url: "../../controladores/controladoresNotas/controladorNotas.php",
                data: {
                    ids: ids,
                    opt: opt,
                    nombreNota: nombreNota,
                    cuerpoNota: cuerpoNota,
                },
                success: function (response) {
                    console.log("Success:", response);
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                }
            });
            setTimeout(function () {
                location.reload(true);
            }, 1500);
        });

    });
</script>