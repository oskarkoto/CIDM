<!--Controlador para detallar todos los Tipos de Dispositivos.-->
<?php
include 'model/TipoDispositivo.php';

$TipoDispositivo = new TipoDispositivo();
$allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();
$msg = NULL;
include 'view/verAllTipoDispositivo.php';