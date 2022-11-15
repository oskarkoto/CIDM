<?php
 include "Model/Ingeniero.php";

 if ($_POST) {
    $sIngeniero = new Ingeniero($_POST['idIngeniero'],$_POST['primerNombre'], $_POST['segundoNombre'], 
    $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['telefono'], $_POST['correoElectronico'], 
    $_POST['direccion'], $_POST['fechaInclusion']);
    if ($sIngeniero->update_ingenieros()){
        $selectIngeniero = $sIngeniero->read_ingenieros($_POST['idIngeniero']);
        $sIngeniero = $selectIngeniero[0];
        $msg = "Se actualizó el Ingeniero.";
        include "view/verDetalleIngeniero.php";
    }    
    
  } else {
    $sIngeniero = new Ingeniero();
    $selectIngeniero = $sIngeniero->read_ingenieros($_GET['idIngeniero']);
    $sIngeniero = $selectIngeniero[0];
    include "view/actualizarIngeniero.php";
  }