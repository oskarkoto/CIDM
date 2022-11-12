<!--Controlador para detallar una Devolucion.-->
<?php
include 'model/Devolucion.php';

$devolucionId = $_GET['idDevolucion'];
$sDevolucion = new Devolucion();
    $selectDevolucion = $sDevolucion->seleccionarDevolucion($devolucionId);
    $sDevolucion = $selectDevolucion[0];
    $EstadoDevGnrl = new EstadoDevolucionGen();
    $allEstadoDevGnrl = $EstadoDevGnrl->seleccionarAllEstadoDevolucionGen();
    $msg = NULL;
include 'view/verDetalleDevolucion.php';