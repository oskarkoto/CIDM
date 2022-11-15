<?php
include 'Model/Ingeniero.php';

if ($_POST) {
  // Validaciones, instancias de objetos, calculos matematicos
  $form = new Ingeniero($_POST['idIngeniero'], $_POST['primerNombre'], $_POST['segundoNombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['telefono'], $_POST['correoElectronico'], $_POST['direccion'], $_POST['fechaInclusion']);
  if($form->create_ingeniero()){
    
    $selectIngeniero  = $form->read_ingenieros($form->idIngeniero);
    $form = $selectIngeniero[0];
    $msg = "NUEVO Técnico creado.";
    include "view/verDetalleIngeniero.php";
  } else {
    $msg = "ERROR registrando Ingeniero.";
    include "view/crearIngeniero.php";
  }
} else {  
  $ingeniero = new Ingeniero();
    $last =$ingeniero->selectLast();
  include 'view/crearIngeniero.php';
}

