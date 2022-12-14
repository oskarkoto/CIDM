<!--Modelo de prestamo.-->
<?php
include_once "model/Connection.php";
include_once "model/Ingeniero.php";

class Prestamo {
    
    public $idPrestamo;
    public $idIngeniero;
    public $fechaPrestamo;
    public $fechaEsperadaDevolucion;
    public $cliente;
    public $estadoPrestamo;


    public function __construct($idPrestamo = 0, $idIngeniero = "",$fechaPrestamo = "",$fechaEsperadaDevolucion="",
    $cliente = "", $estadoPrestamo ="Abierto") {
        $this->idPrestamo = $idPrestamo;
        $this->idIngeniero = $idIngeniero;
        $this->fechaPrestamo = $fechaPrestamo;
        $this->fechaEsperadaDevolucion = $fechaEsperadaDevolucion;
        $this->cliente = $cliente;
        $this->estadoPrestamo = $estadoPrestamo;        
    }

    /**
     * Inserta Prestamo en DB.
    **/
    function insertPrestamo() {
        $pdo = new Connection();
        $pdo = $pdo->open();
        $query = "INSERT INTO prestamo (idPrestamo, idIngeniero,fechaPrestamo,fechaEsperadaDevolucion,cliente,estadoPrestamo) VALUES ('{$this->idPrestamo}','{$this->idIngeniero}','{$this->fechaPrestamo}','{$this->fechaEsperadaDevolucion}','{$this->cliente}','{$this->estadoPrestamo}')";
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
            $rows[] = new Prestamo($row['idPrestamo'], $row['idIngeniero'],$row['fechaPrestamo'],$row['fechaEsperadaDevolucion'],$row['cliente'],$row['estadoPrestamo']);
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
            $rows[] = new Prestamo($row['idPrestamo'], $row['idIngeniero'],$row['fechaPrestamo'],
            $row['fechaEsperadaDevolucion'],$row['cliente'],$row['estadoPrestamo']);
        }
        return $rows; 
    }      
    
    /**
     * Actualiza la informaci??n del pr??stamo.
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