<!--Modelo de devolucion.-->
<?php
include_once "model/Connection.php";
include_once 'model/Prestamo.php';
include_once 'model/PrestamoDispositivo.php';
include_once 'model/PrestamoSuministro.php';
include_once "model/EstadoDevolucionGeneral.php";
include_once "model/EstadoDevolucion.php";
include_once "model/CondicionActual.php";
include_once "model/Dispositivo.php";
include_once "model/Suministro.php";


class Devolucion {
    
    public $idDevolucion;
    public $idPrestamo;
    public $fechaRealDevolucion;
    public $idEstadoDevolucionGeneral;


    public function __construct($idDevolucion = 0, $idPrestamo = 0,$fechaRealDevolucion = "",$idEstadoDevolucionGeneral= 0) {
        $this->idDevolucion = $idDevolucion;
        $this->idPrestamo = $idPrestamo;
        $this->fechaRealDevolucion = $fechaRealDevolucion;
        $this->idEstadoDevolucionGeneral = $idEstadoDevolucionGeneral;
    }

    /**
     * Inserta Devolucion en DB.
    **/
    function insertDevolucion() {
        $pdo = new Connection();
        $pdo = $pdo->open();
        $query = "INSERT INTO devolucion (idDevolucion, idPrestamo,fechaRealDevolucion,idEstadoDevolucionGeneral) VALUES ('{$this->idDevolucion}','{$this->idPrestamo}','{$this->fechaRealDevolucion}','{$this->idEstadoDevolucionGeneral}')";
        $result = $pdo->prepare($query);
        return $result->execute();
    }

    /**
     * Retorna las devoluciones disponibles en la base de datos. 
     * Hace una lista de las mismas.
     **/
    function seleccionarAllDevolucion() {
        $query = "SELECT * FROM devolucion";
        $pdo = new Connection();
        $pdo = $pdo->open();
        $result = $pdo->query($query);
        $rows = [];
        foreach ($result->fetchAll() as $row) {
            $rows[] = new Devolucion($row['idDevolucion'], $row['idPrestamo'],$row['fechaRealDevolucion'],$row['idEstadoDevolucionGeneral']);
        }
        return $rows;
    }      
    
      
    /**
     * Retorna una devolucion disponible en la base de datos. 
     * Hace una lista de detalles.
     **/
    function seleccionarDevolucion($idDevolucion = 0) {
        $query = "SELECT * FROM devolucion";
        if ($idDevolucion) {
            $query .= " where idDevolucion = '$idDevolucion'";
        }
        $pdo = new Connection();
        $pdo = $pdo->open();
        $result = $pdo->query($query);
        $rows = [];
        foreach ($result->fetchAll() as $row) {
            $rows[] = new Devolucion($row['idDevolucion'], $row['idPrestamo'],
            $row['fechaRealDevolucion'],$row['idEstadoDevolucionGeneral']);
        }
        return $rows;
    }      
    
    /**
     * Actualiza la información de la devolucion.
     * NO se requiere en el sistema.
     */
    function actualizarDevolucion(){
        //NO se requiere en el sistema.
    }
    
    /**
     * Elimina una devolucion de la base de datos.
     * NO se requiere en el sistema.
     */
    function eliminarDevolucion($idDevolucion){
        $pdo = new Connection();
        $queryDelete = "DELETE FROM devolucion WHERE idDevolucion = '{$idDevolucion}'";        
        $pdo = $pdo->open();
        return $pdo->query($queryDelete);
    }

    function selectLast() {
        $query = "SELECT idDevolucion FROM devolucion ORDER BY idDevolucion DESC LIMIT 1";
        $pdo = new Connection();
        $pdo = $pdo->open();
        $result = $pdo->query($query);
        $rows = [];
        foreach ($result->fetchAll() as $row) {
            $rows[] = new Devolucion($row['idDevolucion']);
        }
        return $rows;
    }

    function selectLastAll() {
        $query = "SELECT idDevolucion,idPrestamo FROM devolucion ORDER BY idDevolucion DESC LIMIT 1";
        $pdo = new Connection();
        $pdo = $pdo->open();
        $result = $pdo->query($query);
        $rows = [];
        foreach ($result->fetchAll() as $row) {
            $rows[] = new Devolucion($row['idDevolucion'],$row['idPrestamo']);
        }
        return $rows;
    }
}