<!--Controlador para eliminar un Tipo de Dispositivo.-->
<?php
  include "Model/TipoDispositivo.php";

  $idTipoDispositivo = $_GET['idTipoDispositivo'];
  $TipoDispositivo = new TipoDispositivo();    
  if ($TipoDispositivo->delete_tipo_Dispositivo($idTipoDispositivo)){
    $msg = "EXITO al borrar el Tipo de Dispositivo.";
    $allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();
      include 'view/verAllTipoDispositivo.php';
  } else {
     $msg = "ERROR al borrar el Tipo de Dispositivo.";
     $allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();
      include 'view/verAllTipoDispositivo.php';
  }    