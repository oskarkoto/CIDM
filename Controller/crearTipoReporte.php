<!--Controlador para crear Tipo de Reporte.-->
<?php
include 'model/TipoReporte.php';

if ($_POST) {
    $form = new TipoReporte($_POST['idTipoReporte'], $_POST['nombreTipoReporte'], $_POST['detalleTipoReporte'], $_POST['queryTipoReporte']);
    if ($form->insertTipoReporte()) {
        $selectTipoReporte = $form->seleccionarTipoReporte($form->idTipoReporte);
        $form = $selectTipoReporte[0];
        $msg = "NUEVO Tipo de Reporte creado.";
        include "view/verDetalleTipoReporte.php";
    } else {
        $msg = "ERROR creando el Tipo de Reporte.";
        include "view/crearTipoReporte.php";
    }
} else {
    include "view/crearTipoReporte.php";
}