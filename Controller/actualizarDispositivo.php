<?php
include 'model/Dispositivo.php';

if ($_POST) {
  $sDispositivo = new Dispositivo($_POST['idDispositivo'], $_POST['idTipoDispositivo'], $_POST['idCondicionActual'], $_POST['idEstadoInventario'], $_POST['fechaInclusion']);
  if ($sDispositivo->update_Dispositivo()){
      $selectDispositivo = $sDispositivo->read_Dispositivo($_POST['idDispositivo']);
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
      $msg = "Se actualizó el Dispositivo.";
      include "view/verDetalleDispositivo.php";
  }    
  
} else {
  //Select de Dispositivo
  $sDispositivo = new Dispositivo();
  $selectDispositivo = $sDispositivo->read_Dispositivo($_GET['idDispositivo']);
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
  include "view/actualizarDispositivo.php";
}
