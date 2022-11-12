<!--Controlador para eliminar Devolucion.-->
<?php
include "model/Devolucion.php";

    $idDevolucion = $_GET['idDevolucion'];
    $Devolucion = new Devolucion();    
    if ($Devolucion->eliminarDevolucion($idDevolucion)){
        $msg = "EXITO al borrar la devolución.";
        $allDevolucion = $Devolucion->seleccionarAllDevolucion();
        $EstadoDevGnrl = new EstadoDevolucionGen();
        $allEstadoDevGnrl = $EstadoDevGnrl->seleccionarAllEstadoDevolucionGen();
        include 'view/VerAllDevolucion.php';
    } else {
        $msg = "ERROR al borrar la devolución.";
        $allDevolucion = $Devolucion->seleccionarAllDevolucion();
        $EstadoDevGnrl = new EstadoDevolucionGen();
        $allEstadoDevGnrl = $EstadoDevGnrl->seleccionarAllEstadoDevolucionGen();
        include 'view/VerAllDevolucion.php';
    }    


