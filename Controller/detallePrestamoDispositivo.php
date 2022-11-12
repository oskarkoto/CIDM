<!--Controlador para detallar un Prestamo de Dispositivo.-->
<?php
include 'model/PrestamoDispositivo.php';

$prestamoDispositivoId = $_GET['idPrestamoDispositivo'];
$sPrestamoDispositivo = new PrestamoDispositivo();
        $selectPrestamoDispositivo = $sPrestamoDispositivo->seleccionarPrestamoDispositivo($prestamoDispositivoId);
        $sPrestamoDispositivo = $selectPrestamoDispositivo[0];
        $Dispositivo = new Dispositivo();
        $allDispositivo = $Dispositivo->seleccionarAllDispositivo();
        $EstadoDevolucion = new EstadoDevolucion();
        $allEstadoDevolucion = $EstadoDevolucion->seleccionarAllEstadoDevolucion();        
        $TipoDispositivo = new TipoDispositivo();
        $allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();
        $msg = NULL;
        include 'view/verDetallePrestamoDispositivo.php';
