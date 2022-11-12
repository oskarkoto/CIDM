<?php
include 'Model/TipoDispositivo.php';

if ($_POST) {
  // Validaciones, instancias de objetos, calculos matematicos
  $form = new TipoDispositivo( $_POST['idTipoDispositivo'], $_POST['nombreTipoDispositivo'], $_POST['descripcionTipoDispositivo'],
      $_POST['marcaTipoDispositivo'], $_POST['existenciaMinima']);
  if($form->create_tipo_Dispositivo()){
    $selectTipoDispositivo  = $form->read_tipo_Dispositivo($form->idTipoDispositivo);
    $form = $selectTipoDispositivo[0];
    $msg = "NUEVO Tipo de Dispositivo creado.";
    include "view/verDetalleTipoDispositivo.php";
  } else {
    $msg = "ERROR creando el Tipo de Dispositivo.";
    include "view/crearTipoDispositivo.php";
  }
} else {  
  include 'view/crearTipoDispositivo.php';
}


