<?php
include 'model/Dispositivo.php';


if ($_POST) {
  // Validaciones, instancias de objetos, calculos matematicos
  $form = new Dispositivo($_POST['idDispositivo'], $_POST['idTipoDispositivo'], $_POST['idCondicionActual'], $_POST['idEstadoInventario'], $_POST['fechaInclusion']);
  if($form->create_Dispositivo()){
    $selectDispositivo  = $form->read_Dispositivo($form->idDispositivo);
    $form = $selectDispositivo[0];
    //Select de tipo Dispositivo  
    $TipoDispositivo = new TipoDispositivo();
    $allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();
    //Select de estado de inventario
    $EstadoInventario = new EstadoInventario();
    $allEstadoInventario = $EstadoInventario->seleccionarAllEstadoInventario();
    //Select de condicion actual
    $CondicionActual = new CondicionActual();
    $allCondicionActual = $CondicionActual->seleccionarAllCondicionActual();
    $msg = "NUEVO Dispositivo creado.";
    include "view/verDetalleDispositivo.php";
  } else {
    $msg = "ERROR creando El Dispositivo.";
    //Select de tipo Dispositivo  
    $TipoDispositivo = new TipoDispositivo();
    $allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();
    //Select de estado de inventario
    $EstadoInventario = new EstadoInventario();
    $allEstadoInventario = $EstadoInventario->seleccionarAllEstadoInventario();
    //Select de condicion actual
    $CondicionActual = new CondicionActual();
    $allCondicionActual = $CondicionActual->seleccionarAllCondicionActual();    
    include "view/crearDispositivo.php";
  }
} else {
  //Select de tipo Dispositivo  
  $TipoDispositivo = new TipoDispositivo();
  $allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();
  //Select de estado de inventario
  $EstadoInventario = new EstadoInventario();
  $allEstadoInventario = $EstadoInventario->seleccionarAllEstadoInventario();
  //Select de condicion actual
  $CondicionActual = new CondicionActual();
  $allCondicionActual = $CondicionActual->seleccionarAllCondicionActual();
  include 'view/crearDispositivo.php';
}