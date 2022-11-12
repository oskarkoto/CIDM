<!--Controlador para eliminar un Tecnico.-->
<?php
  include "Model/Tecnico.php";

  $idTecnico = $_GET['idTecnico'];
  $tecnico = new Tecnico();    
  if ($tecnico->delete_tecnicos($idTecnico)){
    $msg = "ÉXITO al borrar el Técnico.";
    $allTecnico = $tecnico->seleccionarAllTecnico();
      include 'view/verAllTecnico.php';
  } else {
     $msg = "ERROR al borrar el Técnico.";
     $allTecnico = $tecnico->seleccionarAllTecnico();
      include 'view/verAllTecnico.php';
  }    