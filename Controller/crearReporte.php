<!--Controlador para crear Reporte.-->
<?php
include 'model/Reporte.php';

if ($_POST) {
    $form = new Reporte("Reporte", $_POST['idTipoReporte'], date("Y-m-d H:i:s"));
    if ($form->insertReporte()) {
        $Reporte = new Reporte();
        $allReporte = $Reporte->seleccionarAllReporte();
        $TipoReporte = new TipoReporte();
        $allTipoReporte = $TipoReporte->seleccionarAllTipoReporte();
        $resultsReporte = $Reporte->generarReporte($_POST['idTipoReporte']);
        $msg = "NUEVO Reporte creado.";
        switch($_POST['idTipoReporte'])
        {
            case 1:
                include "view/verReporteTipo1.php";
                break;
            case 2:
                include "view/verReporteTipo2.php";
                break; 
            case 3:
                include "view/verReporteTipo3.php";
                break;   
            case 4:
                include "view/verReporteTipo4.php";
                break;
            case 5:
                include "view/verReporteTipo5.php";
                break;
            case 6:
                include "view/verReporteTipo6.php";
                break;
        }
    } else {
        $msgError = "ERROR creando el Reporte.";
        include "view/crearReporte.php";
    }
} else {
    $TipoReporte = new TipoReporte();
    $allTipoReporte = $TipoReporte->seleccionarAllTipoReporte();
    include "view/crearReporte.php";
}