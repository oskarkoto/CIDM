<!--Controlador para crear Prestamo.-->
<?php
include 'model/Prestamo.php';

if ($_POST) {
    $form = new Prestamo($_POST['idPrestamo'], $_POST['idTecnico'], $_POST['fechaPrestamo'], $_POST['fechaEsperadaDevolucion'], $_POST['cliente']);
    if ($form->insertPrestamo()) {
        $selectPrestamo = $form->seleccionarPrestamo($form->idPrestamo);
        $form = $selectPrestamo[0];
        $Tecnico = new Tecnico();
        $allTecnico = $Tecnico->seleccionarAllTecnico();
        $msg = "NUEVO Préstamo creado.";
        include "view/verDetallePrestamo.php";
    } else {
        $msg = "ERROR creando Prestamo.";
        $Tecnico = new Tecnico();
        $allTecnico = $Tecnico->seleccionarAllTecnico();
        include "view/crearPrestamo.php";
    }
} else {
    $prestamo = new Prestamo();
    $last =$prestamo->selectLast();
    $Tecnico = new Tecnico();
    $allTecnico = $Tecnico->seleccionarAllTecnico();
    include "view/crearPrestamo.php";
}