<!--Controlador para detallar todas las Devoluciones.-->
<?php
include 'model/Devolucion.php';

$Devolucion = new Devolucion();
$allDevolucion = $Devolucion->seleccionarAllDevolucion();

    $Prestamo = new Prestamo();
    $allPrestamo = $Prestamo->seleccionarAllPrestamo();
    $EstadoDevGnrl = new EstadoDevolucionGen();
    $allEstadoDevGnrl = $EstadoDevGnrl->seleccionarAllEstadoDevolucionGen();
    $msg = NULL;
    include 'view/VerAllDevolucion.php';