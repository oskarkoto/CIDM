<!--Modelo de prestamo.-->
<?php
include_once "model/Connection.php";
include_once "model/Tecnico.php";

class Prestamo {
    
    public $idPrestamo;
    public $idTecnico;
    public $fechaPrestamo;
    public $fechaEsperadaDevolucion;
    public $cliente;


    public function __construct($idPrestamo = 0, $idTecnico = "",$fechaPrestamo = "",$fechaEsperadaDevolucion="",
    $cliente = "") {
        $this->idPrestamo = $idPrestamo;
        $this->idTecnico = $idTecnico;
        $this->fechaPrestamo = $fechaPrestamo;
        $this->fechaEsperadaDevolucion = $fechaEsperadaDevolucion;
        $this->cliente = $cliente;        
    }

    /**
     * Inserta Prestamo en DB.
    **/
    function insertPrestamo() {
        $pdo = new Connection();
        $pdo = $pdo->open();
        $query = "INSERT INTO prestamo (idPrestamo, idTecnico,fechaPrestamo,fechaEsperadaDevolucion,cliente) VALUES ('{$this->idPrestamo}','{$this->idTecnico}','{$this->fechaPrestamo}','{$this->fechaEsperadaDevolucion}','{$this->cliente}')";
        $result = $pdo->prepare($query);
        return $result->execute();
    }

    /**
     * Retorna los prestamos disponibles en la base de datos. 
     * Hace una lista de los mismos.
     **/
    function seleccionarAllPrestamo() {
        $query = "SELECT * FROM prestamo";
        $pdo = new Connection();
        $pdo = $pdo->open();
        $result = $pdo->query($query);
        $rows = [];
        foreach ($result->fetchAll() as $row) {
            $rows[] = new Prestamo($row['idPrestamo'], $row['idTecnico'],$row['fechaPrestamo'],$row['fechaEsperadaDevolucion'],$row['cliente']);
        }
        return $rows;
    }      
    
      
    /**
     * Retorna un prestamo disponible en la base de datos. 
     * Hace una lista de detalles.
     **/
    function seleccionarPrestamo($idPrestamo = "") {
        $query = "SELECT * FROM prestamo";
        if ($idPrestamo) {
            $query .= " where idPrestamo = '$idPrestamo'";
        }
        $pdo = new Connection();
        $pdo = $pdo->open();
        $result = $pdo->query($query);
        $rows = [];
        foreach ($result->fetchAll() as $row) {
            $rows[] = new Prestamo($row['idPrestamo'], $row['idTecnico'],$row['fechaPrestamo'],
            $row['fechaEsperadaDevolucion'],$row['cliente']);
        }
        return $rows; 
    }      
    
    /**
     * Actualiza la información del préstamo.
     * NO se requiere en el sistema.
     */
    function actualizarPrestamo(){
        //NO se requiere en el sistema.
    }
    
    /**
     * Elimina un prestamo de la base de datos.
     * NO se requiere en el sistema.
     */
    function eliminarPrestamo($idPrestamo){
        $pdo = new Connection();
        $queryDelete = "DELETE FROM prestamo WHERE idPrestamo = '{$idPrestamo}'";        
        $pdo = $pdo->open();
        return $pdo->query($queryDelete);
    }

    function selectLast() {
        $query = "SELECT idPrestamo FROM prestamo ORDER BY idPrestamo DESC LIMIT 1";
        $pdo = new Connection();
        $pdo = $pdo->open();
        $result = $pdo->query($query);
        $rows = [];
        foreach ($result->fetchAll() as $row) {
            $rows[] = new Prestamo($row['idPrestamo']);
        }
        return $rows;
    }
}