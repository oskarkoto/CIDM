<!--Controlador para detallar un Tecnico.-->
<?php
include 'model/Tecnico.php';

$tecnicoId = $_GET['idTecnico'];
$sTecnico = new Tecnico();
$selectTecnico = $sTecnico->read_tecnicos($tecnicoId);
$sTecnico = $selectTecnico[0];
$msg = NULL;

include 'view/verDetalleTecnico.php';