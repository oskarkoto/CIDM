<?php
include 'model/Devolucion.php';
if ($_POST) {
  $sDispositivo = new Dispositivo($_POST['idDispositivo'], $_POST['idTipoDispositivo'], $_POST['idCondicionActual'], $_POST['idEstadoInventario']);
  if ($sDispositivo->update_Dispositivo_condicion()){
    $CondicionActual = new CondicionActual();
    $allCondicionActual = $CondicionActual->seleccionarAllCondicionActual();
    $Prestamo = $_POST['idPrestamo'];
    //Select de Dispositivos
    $PrestamoDispositivo = new PrestamoDispositivo();
    $allPrestamoDispositivo = $PrestamoDispositivo->seleccionarAllPrestamoDispositivo();
    $Dispositivo = new Dispositivo();
    $allDispositivo = $Dispositivo->seleccionarAllDispositivo();
    $TipoDispositivo = new TipoDispositivo();
    $allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();
    
    $devoluciones = new Devolucion();
    $last =$devoluciones->selectLastAll();
    $msg = NULL;
    include "view/crearDevolucionall.php";
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
  $devoluciones = new Devolucion();
  $last =$devoluciones->selectLastAll();
  include "view/actualizarCondDispositivo.php";
}
