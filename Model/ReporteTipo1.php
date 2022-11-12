<!--Modelo de reporte de tipo 1.-->
<?php

class ReporteTipo1 {
    
    public $idDispositivo;
    public $nombreTipoDispositivo;
    public $descripcionCondicionActual;
    public $descripcionEstadoInventario;
    public $fechaInclusion;

    public function __construct( $idDispositivo = "",$nombreTipoDispositivo = "",$descripcionCondicionActual= "", 
    $descripcionEstadoInventario = "", $fechaInclusion = "") {
        $this->idDispositivo = $idDispositivo;
        $this->nombreTipoDispositivo = $nombreTipoDispositivo;
        $this->descripcionCondicionActual = $descripcionCondicionActual;
        $this->descripcionEstadoInventario = $descripcionEstadoInventario;
        $this->fechaInclusion = $fechaInclusion;
    }
}