<?php
 include "Model/TipoDispositivo.php";

 if ($_POST) {
  $sTipoDispositivo = new TipoDispositivo($_POST['idTipoDispositivo'], $_POST['nombreTipoDispositivo'], $_POST['descripcionTipoDispositivo'], 
  $_POST['marcaTipoDispositivo'], $_POST['existenciaMinima']);
  if ($sTipoDispositivo->update_tipo_Dispositivo()){
      $selectTipoDispositivo = $sTipoDispositivo->read_tipo_Dispositivo($_POST['idTipoDispositivo']);
      $sTipoDispositivo = $selectTipoDispositivo[0];
      $msg = "Se actualizó el Tipo de Dispositivo.";
      include "view/verDetalleTipoDispositivo.php";
  }    
  
} else {
  $sTipoDispositivo = new TipoDispositivo();
  $selectTipoDispositivo = $sTipoDispositivo->read_tipo_Dispositivo($_GET['idTipoDispositivo']);
  $sTipoDispositivo = $selectTipoDispositivo[0];
  include "view/actualizarTipoDispositivo.php";
}
 
