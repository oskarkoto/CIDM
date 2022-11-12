<!--Controlador para crear Prestamo de Dispositivo.-->
<?php
include 'model/PrestamoDispositivo.php';

if ($_POST) {
    $form = new PrestamoDispositivo($_POST['idPrestamoDispositivo'], $_POST['idPrestamo'], $_POST['idDispositivo'], $_POST['idEstadoDevolucion']);
    if ($form->insertPrestamoDispositivo()) {
        $selectPrestamoDispositivo = $form->seleccionarPrestamoDispositivo($form->idPrestamoDispositivo);
        $form = $selectPrestamoDispositivo[0];
        $Dispositivo = new Dispositivo();
        $allDispositivo = $Dispositivo->seleccionarAllDispositivo();
        $EstadoDevolucion = new EstadoDevolucion();
        $allEstadoDevolucion = $EstadoDevolucion->seleccionarAllEstadoDevolucion();
        $TipoDispositivo = new TipoDispositivo();
        $allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();
        $msg = "NUEVO Préstamo de Dispositivo creado.";
        include "view/verDetallePrestamoDispositivo.php";
    } else {
        $msg = "ERROR creando Prestamo de Dispositivo.";
        $Prestamo = new Prestamo();
        $allPrestamo = $Prestamo->seleccionarAllPrestamo();
        $Dispositivo = new Dispositivo();
        $allDispositivo = $Dispositivo->seleccionarAllDispositivo();
        $EstadoDevolucion = new EstadoDevolucion();
        $allEstadoDevolucion = $EstadoDevolucion->seleccionarAllEstadoDevolucion();
        $TipoDispositivo = new TipoDispositivo();
        $allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();
        $prestamoe = new PrestamoDispositivo();
        $last =$prestamoe->selectLast();
            include "view/crearPrestamoDispositivo.php";
    }
} else {
        $Prestamo = new Prestamo();
        $allPrestamo = $Prestamo->seleccionarAllPrestamo();
        $Dispositivo = new Dispositivo();
        $allDispositivo = $Dispositivo->seleccionarAllDispositivo();
        $EstadoDevolucion = new EstadoDevolucion();
        $allEstadoDevolucion = $EstadoDevolucion->seleccionarAllEstadoDevolucion();
        $TipoDispositivo = new TipoDispositivo();
        $allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();

        $prestamoe = new PrestamoDispositivo();
        $last =$prestamoe->selectLast();
            include "view/crearPrestamoDispositivo.php";
}