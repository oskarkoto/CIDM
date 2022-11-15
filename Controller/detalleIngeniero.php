<!--Controlador para detallar un Ingeniero.-->
<?php
include 'model/Ingeniero.php';

$ingenieroId = $_GET['idIngeniero'];
$sIngeniero = new Ingeniero();
$selectIngeniero = $sIngeniero->read_ingenieros($ingenieroId);
$sIngeniero = $selectIngeniero[0];
$msg = NULL;

include 'view/verDetalleIngeniero.php';