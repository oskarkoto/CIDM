<!--Controlador para detallar todos los Dispositivos.-->
<?php
include 'model/Dispositivo.php';

$Dispositivo = new Dispositivo();
    $allDispositivo = $Dispositivo->seleccionarAllDispositivo();
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
    include 'view/verAllDispositivo.php';