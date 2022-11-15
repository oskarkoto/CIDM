<!--Controlador para detallar un Prestamo.-->
<?php
include 'model/Prestamo.php';

$prestamoId = $_GET['idPrestamo'];
$sPrestamo = new Prestamo();

    $selectPrestamo = $sPrestamo->seleccionarPrestamo($prestamoId);
    $sPrestamo = $selectPrestamo[0];
    $Ingeniero = new Ingeniero();
    $allIngeniero = $Ingeniero->seleccionarAllIngeniero();
    $msg = NULL;
include 'view/verDetallePrestamo.php';
