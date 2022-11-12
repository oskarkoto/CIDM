<!--Controlador para eliminar un Dispositivo.-->
<?php
  include "Model/Dispositivo.php";

  $idDispositivo = $_GET['idDispositivo'];
  $Dispositivo = new Dispositivo();    
  if ($Dispositivo->delete_Dispositivo($idDispositivo)){
    $msg = "EXITO al borrar el Dispositivo.";
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
      include 'view/verAllDispositivo.php';
  } else {
    $msg = "ERROR al borrar el Dispositivo.";
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
      include 'view/verAllDispositivo.php';
  }    