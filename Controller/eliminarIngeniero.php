<!--Controlador para eliminar un Ingeniero.-->
<?php
  include "Model/Ingeniero.php";

  $idIngeniero = $_GET['idIngeniero'];
  $ingeniero = new Ingeniero();    
  if ($ingeniero->delete_ingenieros($idIngeniero)){
    $msg = "ÉXITO al borrar el Ingeniero.";
    $allIngeniero = $ingeniero->seleccionarAllIngeniero();
      include 'view/verAllIngeniero.php';
  } else {
     $msg = "ERROR al borrar el Ingeniero.";
     $allIngeniero = $ingeniero->seleccionarAllIngeniero();
      include 'view/verAllIngeniero.php';
  }    