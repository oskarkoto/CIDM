<!--Controlador para detallar todos los Reportes.-->
<?php
include 'model/Reporte.php';

    $Reporte = new Reporte();
    $allReporte = $Reporte->seleccionarAllReporte();
    $tipoReporte = new TipoReporte();
    $allTipoReporte = $tipoReporte->seleccionarAllTipoReporte();
    $msg = NULL;
    include 'view/VerAllReporte.php';