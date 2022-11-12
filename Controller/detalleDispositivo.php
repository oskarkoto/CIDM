<!--Controlador para detallar un Tecnico.-->
<?php
include 'model/Dispositivo.php';

$DispositivoId = $_GET['idDispositivo'];
$sDispositivo = new Dispositivo();
    $selectDispositivo = $sDispositivo->read_Dispositivo($DispositivoId);
    $sDispositivo = $selectDispositivo[0];
    //Select de tipo Dispositivo  
    $TipoDispositivo = new TipoDispositivo();
    $allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();
    //Select de estado de inventario
    $EstadoInventario = new EstadoInventario();
    $allEstadoInventario = $EstadoInventario->seleccionarAllEstadoInventario();
    //Select de condicion actual
    $CondicionActual = new CondicionActual();
    $allCondicionActual = $CondicionActual->seleccionarAllCondicionActual();
    $msg = NULL;
    include 'view/verDetalleDispositivo.php';