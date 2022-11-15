<!--Modelo de reporte de tipo 6.-->
<?php

class ReporteTipo5 {
    
    public $idTipoDispositivo;
    public $nombreTipoDispositivo;
    public $descripcionTipoDispositivo;
    public $marcaTipoDispositivo;
    public $existenciaMinima;
    public $existenciaActual;

    public function __construct( $idTipoDispositivo = "",$nombreTipoDispositivo = "",$descripcionTipoDispositivo= "", 
    $marcaTipoDispositivo = "", $existenciaMinima = 0, $existenciaActual = 0) {
        $this->idTipoDispositivo = $idTipoDispositivo;
        $this->nombreTipoDispositivo = $nombreTipoDispositivo;
        $this->descripcionTipoDispositivo = $descripcionTipoDispositivo;
        $this->marcaTipoDispositivo = $marcaTipoDispositivo;
        $this->existenciaMinima = $existenciaMinima;
        $this->existenciaActual = $existenciaActual;
    }
}