<!--Controlador para detallar un Reporte.-->
<?php
include 'model/Reporte.php';

$reporteId = $_GET['idReporte'];
$sReporte = new Reporte();
$selectReporte = $sReporte->seleccionarReporte($reporteId);
$sReporte = $selectReporte[0];
//Select tipo de reporte
$tipoReporte = new TipoReporte();
$allTipoReporte = $tipoReporte->seleccionarAllTipoReporte();
$msg = NULL;

include 'view/verDetalleReporte.php';