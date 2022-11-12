<!--Controlador para eliminar Prestamo de Dispositivo.-->
<?php
include "model/PrestamoDispositivo.php";

$idPrestamoDispositivo = $_GET['idPrestamoDispositivo'];
$PrestamoDispositivo = new PrestamoDispositivo();    
    if ($PrestamoDispositivo->eliminarPrestamoDispositivo($idPrestamoDispositivo)){
        $msg = "EXITO al borrar el Préstamo de Dispositivo.";
        $Dispositivo = new Dispositivo();
        $allDispositivo = $Dispositivo->seleccionarAllDispositivo();
        $allPrestamoDispositivo = $PrestamoDispositivo->seleccionarAllPrestamoDispositivo();
        $EstadoDevolucion = new EstadoDevolucion();    
        $allEstadoDevolucion = $EstadoDevolucion->seleccionarAllEstadoDevolucion();
        $TipoDispositivo = new TipoDispositivo();
        $allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();
        include 'view/verAllPrestamoDispositivo.php';
    } else {
        $msg = "ERROR al borrar el Préstamo de Dispositivo.";
        $allPrestamoDispositivo = $PrestamoDispositivo->seleccionarAllPrestamoDispositivo();
        $EstadoDevolucion = new EstadoDevolucion();    
        $allEstadoDevolucion = $EstadoDevolucion->seleccionarAllEstadoDevolucion();
        $TipoDispositivo = new TipoDispositivo();
        $allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();
        $Dispositivo = new Dispositivo();
        $allDispositivo = $Dispositivo->seleccionarAllDispositivo();
            include 'view/verAllPrestamoDispositivo.php';
    }    

