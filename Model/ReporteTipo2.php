<!--Modelo de reporte de tipo 3.-->
<?php

class ReporteTipo2 {
    
    public $idPrestamo;
    public $idIngeniero;
    public $fechaPrestamo;
    public $fechaEsperadaDevolucion;
    public $cliente;

    public function __construct( $idPrestamo = 0,$idIngeniero = "",$fechaPrestamo= "", 
    $fechaEsperadaDevolucion = "", $cliente = "") {
        $this->idPrestamo = $idPrestamo;
        $this->idIngeniero = $idIngeniero;
        $this->fechaPrestamo = $fechaPrestamo;
        $this->fechaEsperadaDevolucion = $fechaEsperadaDevolucion;
        $this->cliente = $cliente;
    }
}