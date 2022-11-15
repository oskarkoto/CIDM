<!--Controlador para crear Prestamo.-->
<?php
include 'model/Prestamo.php';

if ($_POST) {
    $form = new Prestamo($_POST['idPrestamo'], $_POST['idIngeniero'], $_POST['fechaPrestamo'], $_POST['fechaEsperadaDevolucion'], $_POST['cliente']);
    if ($form->insertPrestamo()) {
        $selectPrestamo = $form->seleccionarPrestamo($form->idPrestamo);
        $form = $selectPrestamo[0];
        $Ingeniero = new Ingeniero();
        $allIngeniero = $Ingeniero->seleccionarAllIngeniero();
        $msg = "NUEVO Préstamo creado.";
        include "view/verDetallePrestamo.php";
    } else {
        $msg = "ERROR creando Prestamo.";
        $Ingeniero = new Ingeniero();
        $allIngeniero = $Ingeniero->seleccionarAllIngeniero();
        include "view/crearPrestamo.php";
    }
} else {
    $prestamo = new Prestamo();
    $last =$prestamo->selectLast();
    $Ingeniero = new Ingeniero();
    $allIngeniero = $Ingeniero->seleccionarAllIngeniero();
    include "view/crearPrestamo.php";
}