<!--Modelo de reporte de tipo 3.-->
<?php

class ReporteTipo3 {
    
    public $idPrestamo;
    public $idTecnico;
    public $fechaPrestamo;
    public $fechaEsperadaDevolucion;
    public $cliente;

    public function __construct( $idPrestamo = 0,$idTecnico = "",$fechaPrestamo= "", 
    $fechaEsperadaDevolucion = "", $cliente = "") {
        $this->idPrestamo = $idPrestamo;
        $this->idTecnico = $idTecnico;
        $this->fechaPrestamo = $fechaPrestamo;
        $this->fechaEsperadaDevolucion = $fechaEsperadaDevolucion;
        $this->cliente = $cliente;
    }
}