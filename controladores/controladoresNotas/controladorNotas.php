<?php

include "funcionesNotas.php";

$opt = filter_input(INPUT_POST, 'opt', FILTER_SANITIZE_NUMBER_INT);
$notes = new funcionesNotas();
session_start();
switch ($opt) {
    case 0:
        //Update
        $id = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_NUMBER_INT);
        $nombre = filter_input(INPUT_POST, 'nombreNota', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cuerpo = filter_input(INPUT_POST, 'cuerpoNota', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $notes->actualizarNotas($id, $nombre, $cuerpo);
        break; 

    case 1:
        //Crear notas
        $notes->crearNota();
        break;
    case 2:
        //Borrar
        $id = filter_input(INPUT_POST, 'idNota', FILTER_SANITIZE_NUMBER_INT);
        $notes->borrarNota($id);

}