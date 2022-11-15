<!--Controlador para detallar todos los Prestamos.-->
<?php
include 'model/Prestamo.php';

    $Prestamo = new Prestamo();
    $allPrestamo = $Prestamo->seleccionarAllPrestamo();
    $Ingeniero = new Ingeniero();
    $allIngeniero = $Ingeniero->seleccionarAllIngeniero();
    $msg = NULL;
    include 'view/VerAllPrestamo.php';