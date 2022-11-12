<!--Controlador para detallar un Tipo de Dispositivo.-->
<?php
include 'model/TipoDispositivo.php';

$tipoDispositivoId = $_GET['idTipoDispositivo'];
$sTipoDispositivo = new TipoDispositivo();
$selectTipoDispositivo = $sTipoDispositivo->read_tipo_Dispositivo($tipoDispositivoId);
$sTipoDispositivo = $selectTipoDispositivo[0];
$msg = NULL;

include 'view/verDetalleTipoDispositivo.php';