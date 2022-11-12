<!--Modelo de reporte de tipo 2.-->
<?php

class ReporteTipo2 {
    
    public $idSuministro;
    public $nombreTipoSuministro;
    public $descripcionCondicionActual;
    public $descripcionEstadoInventario;
    public $fechaInclusion;

    public function __construct( $idSuministro = "",$nombreTipoSuministro = "",$descripcionCondicionActual= "", 
    $descripcionEstadoInventario = "", $fechaInclusion = "") {
        $this->idSuministro = $idSuministro;
        $this->nombreTipoSuministro = $nombreTipoSuministro;
        $this->descripcionCondicionActual = $descripcionCondicionActual;
        $this->descripcionEstadoInventario = $descripcionEstadoInventario;
        $this->fechaInclusion = $fechaInclusion;
    }
}