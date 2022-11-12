<?php
 include "Model/Tecnico.php";

 if ($_POST) {
    $sTecnico = new Tecnico($_POST['idTecnico'],$_POST['primerNombre'], $_POST['segundoNombre'], 
    $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['telefono'], $_POST['correoElectronico'], 
    $_POST['direccion'], $_POST['fechaInclusion']);
    if ($sTecnico->update_tecnicos()){
        $selectTecnico = $sTecnico->read_tecnicos($_POST['idTecnico']);
        $sTecnico = $selectTecnico[0];
        $msg = "Se actualizó el Técnico.";
        include "view/verDetalleTecnico.php";
    }    
    
  } else {
    $sTecnico = new Tecnico();
    $selectTecnico = $sTecnico->read_tecnicos($_GET['idTecnico']);
    $sTecnico = $selectTecnico[0];
    include "view/actualizarTecnico.php";
  }