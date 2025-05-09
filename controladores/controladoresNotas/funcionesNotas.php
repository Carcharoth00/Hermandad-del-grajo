<?php

class funcionesNotas
{
    public function actualizarNotas($id, $nombre, $cuerpo)
    {
        include "../conexionBBDD.php";
        $userId = filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
        $nombreTabla = "notas_" . $userId;

        $filt = $con->prepare("UPDATE $nombreTabla SET Nombre_nota = ? WHERE ID_nota = ?");
        $filt->bind_param('si', $nombre, $id);
        $filt->execute();


        $filt = $con->prepare("UPDATE $nombreTabla SET Cuerpo_nota = ? WHERE ID_nota = ?");
        $filt->bind_param('si', $cuerpo, $id);
        $filt->execute();
    }

    public function crearNota()
    {
        include "../conexionBBDD.php";
        $userId = filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
        $nombreTabla = "notas_" . $userId;

        $filt = $con->prepare("INSERT INTO $nombreTabla (Nombre_nota, Cuerpo_nota) VALUES (?, ?)");
        $nombre = "Nueva Nota";
        $cuerpo = "Contenido de la nota";
        $filt->bind_param('ss', $nombre, $cuerpo);
        $filt->execute();

    }

    public function borrarNota($id)
    {
        include "../conexionBBDD.php";
        $userId = filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
        $nombreTabla = "notas_" . $userId;

        $filt = $con->prepare("DELETE FROM $nombreTabla WHERE ID_nota = ?");
        $filt->bind_param('i', $id);
        $filt->execute();
    }
}