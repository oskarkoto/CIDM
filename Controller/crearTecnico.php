<?php
include 'Model/Tecnico.php';

if ($_POST) {
  // Validaciones, instancias de objetos, calculos matematicos
  $form = new Tecnico($_POST['idTecnico'], $_POST['primerNombre'], $_POST['segundoNombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['telefono'], $_POST['correoElectronico'], $_POST['direccion'], $_POST['fechaInclusion']);
  if($form->create_tecnico()){
    
    $selectTecnico  = $form->read_tecnicos($form->idTecnico);
    $form = $selectTecnico[0];
    $msg = "NUEVO Técnico creado.";
    include "view/verDetalleTecnico.php";
  } else {
    $msg = "ERROR registrando Técnico.";
    include "view/crearTecnico.php";
  }
} else {  
  $tecnico = new Tecnico();
    $last =$tecnico->selectLast();
  include 'view/crearTecnico.php';
}

