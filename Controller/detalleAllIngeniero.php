<!--Controlador para detallar todos los Ingenieros.-->
<?php
include 'model/Ingeniero.php';

$Ingeniero = new Ingeniero();
$allIngeniero = $Ingeniero->seleccionarAllIngeniero();
$msg = NULL;
include 'view/verAllIngeniero.php';