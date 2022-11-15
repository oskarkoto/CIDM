<!--Modelo de reporte de tipo 3 y 4.-->
<?php

class ReporteTipo34 {
    
    public $idPrestamo;
    public $idIngeniero;
    public $primerNombre;
    public $segundoNombre;
    public $primerApellido;
    public $segundoApellido;
    public $telefono;
    public $correoElectronico;

    public function __construct( $idPrestamo = 0,$idIngeniero = "",$primerNombre= "", 
    $segundoNombre = "", $primerApellido = "", $segundoApellido = "", $telefono = "", 
    $correoElectronico = "") {
        $this->idPrestamo = $idPrestamo;
        $this->idIngeniero = $idIngeniero;
        $this->primerNombre = $primerNombre;
        $this->segundoNombre = $segundoNombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->telefono = $telefono;
        $this->correoElectronico = $correoElectronico;
    }
}