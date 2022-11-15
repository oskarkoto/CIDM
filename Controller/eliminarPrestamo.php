<!--Controlador para eliminar Prestamo.-->
<?php
include "model/Prestamo.php";

$idPrestamo = $_GET['idPrestamo'];
$Prestamo = new Prestamo();    
if ($Prestamo->eliminarPrestamo($idPrestamo)){
  $msg = "EXITO al borrar el Préstamo.";
  $allPrestamo = $Prestamo->seleccionarAllPrestamo();
  $Ingeniero = new Ingeniero();
  $allIngeniero = $Ingeniero->seleccionarAllIngeniero();
    include 'view/verAllPrestamo.php';
} else {
   $msg = "ERROR al borrar el Préstamo.";
   $allPrestamo = $Prestamo->seleccionarAllPrestamo();
   $Ingeniero = new Ingeniero();
   $allIngeniero = $Ingeniero->seleccionarAllIngeniero();
    include 'view/verAllPrestamo.php';
}    
