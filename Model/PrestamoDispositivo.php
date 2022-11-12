<!--Modelo de prestamo de Dispositivo. -->
<?php
include_once "model/Connection.php";
include_once "model/Prestamo.php";
include_once "model/Dispositivo.php";
include_once "model/TipoDispositivo.php";
include_once "model/EstadoDevolucion.php";

class PrestamoDispositivo {
    
    public $idPrestamoDispositivo;
    public $idPrestamo;
    public $idDispositivo;
    public $idEstadoDevolucion;


    public function __construct($idPrestamoDispositivo = 0, $idPrestamo = 0,$idDispositivo = 0,$idEstadoDevolucion= 0) {
        $this->idPrestamoDispositivo = $idPrestamoDispositivo;
        $this->idPrestamo = $idPrestamo;
        $this->idDispositivo = $idDispositivo;
        $this->idEstadoDevolucion = $idEstadoDevolucion;
    }

    /**
     * Inserta Prestamo de Dispositivo en DB.

    **/
    function insertPrestamoDispositivo() {
        $pdo = new Connection();
        $pdo = $pdo->open();
        $query = "INSERT INTO prestamoDispositivo (idPrestamoDispositivo, idPrestamo,idDispositivo,idEstadoDevolucion) VALUES ('{$this->idPrestamoDispositivo}','{$this->idPrestamo}','{$this->idDispositivo}','{$this->idEstadoDevolucion}')";
        $result = $pdo->prepare($query);
        return $result->execute();
    }

    /**
     * Retorna los prestamos de Dispositivo disponibles en la base de datos. 
     * Hace una lista de los mismos.
     **/
    function seleccionarAllPrestamoDispositivo() {
        $query = "SELECT * FROM prestamoDispositivo";
        $pdo = new Connection();
        $pdo = $pdo->open();
        $result = $pdo->query($query);
        $rows = [];
        foreach ($result->fetchAll() as $row) {
            $rows[] = new PrestamoDispositivo($row['idPrestamoDispositivo'], $row['idPrestamo'],$row['idDispositivo'],$row['idEstadoDevolucion']);
        }
        return $rows;
    }      
    
      
    /**
     * Retorna un prestamo de Dispositivo disponible en la base de datos. 
     * Hace una lista de detalles.
     **/
    function seleccionarPrestamoDispositivo($idPrestamoDispositivo = 0) {
        $query = "SELECT * FROM prestamoDispositivo";
        if ($idPrestamoDispositivo) {
            $query .= " where idPrestamoDispositivo = '$idPrestamoDispositivo'";
        }
        $pdo = new Connection();
        $pdo = $pdo->open();
        $result = $pdo->query($query);
        $rows = [];
        foreach ($result->fetchAll() as $row) {
            $rows[] = new PrestamoDispositivo($row['idPrestamoDispositivo'], $row['idPrestamo'],
            $row['idDispositivo'],$row['idEstadoDevolucion']);
        }
        return $rows;
    }      
    
    /**
     * Actualiza la información del prestamo de Dispositivo.
     * NO se requiere en el sistema.
     */
    function actualizarPrestamoDispositivo(){
        //NO se requiere en el sistema.
    }
    
    /**
     * Elimina un prestamo de Dispositivo de la base de datos.
     * NO se requiere en el sistema.
     */
    function eliminarPrestamoDispositivo($idPrestamoDispositivo){
        $pdo = new Connection();
        $queryDelete = "DELETE FROM prestamoDispositivo WHERE idPrestamoDispositivo = '{$idPrestamoDispositivo}'";        
        $pdo = $pdo->open();
        return $pdo->query($queryDelete);
    }  

    function selectLast() {
        $query = "SELECT idPrestamoDispositivo FROM prestamoDispositivo ORDER BY idPrestamoDispositivo DESC LIMIT 1";
        $pdo = new Connection();
        $pdo = $pdo->open();
        $result = $pdo->query($query);
        $rows = [];
        foreach ($result->fetchAll() as $row) {
            $rows[] = new PrestamoDispositivo($row['idPrestamoDispositivo']);
        }
        return $rows;
    }
}