<!--Modelo de estado de devolucion general.-->
<?php
include_once "model/Connection.php";

class EstadoDevolucionGen {
    
    public $idEstadoDevolucionGeneral;
    public $descripcionEstadoDevolucionGeneral;

    public function __construct($idEstadoDevolucionGeneral = 0, $descripcionEstadoDevolucionGeneral = "") {
        $this->idEstadoDevolucionGeneral = $idEstadoDevolucionGeneral;
        $this->descripcionEstadoDevolucionGeneral = $descripcionEstadoDevolucionGeneral;
    }

    /**
     * Inserta Estado de Devolucion General en DB.
    **/
    function insertEstadoDevolucionGen() {
        $pdo = new Connection();
        $pdo = $pdo->open();
        $query = "INSERT INTO estadodevoluciongeneral (idEstadoDevolucionGeneral, descripcionEstadoDevolucionGeneral) VALUES ('{$this->idEstadoDevolucionGeneral}','{$this->descripcionEstadoDevolucionGeneral}')";
        $result = $pdo->prepare($query);
        return $result->execute();
    }

    /**
     * Retorna los estados de devolucion general disponibles en la base de datos. 
     * Hace una lista de las mismas.
    **/
    function seleccionarAllEstadoDevolucionGen() {
        $query = "SELECT * FROM estadodevoluciongeneral";
        $pdo = new Connection();
        $pdo = $pdo->open();
        $result = $pdo->query($query);
        $rows = [];
        foreach ($result->fetchAll() as $row) {
            $rows[] = new EstadoDevolucionGen($row['idEstadoDevolucionGeneral'], $row['descripcionEstadoDevolucionGeneral']);
        }
        return $rows;
    }      
        
    /**
     * Retorna un estado de devolucion general disponible en la base de datos. 
     * Hace una lista de detalles.
    **/
    function seleccionarEstadoDevolucionGen($idEstadoDevolucionGeneral = "") {
        $query = "SELECT * FROM estadodevoluciongeneral";
        if ($idEstadoDevolucionGeneral) {
            $query .= " WHERE idEstadoDevolucionGeneral = '$idEstadoDevolucionGeneral'";
        }
        $pdo = new Connection();
        $pdo = $pdo->open();
        $result = $pdo->query($query);
        $rows = [];
        foreach ($result->fetchAll() as $row) {
            $rows[] = new EstadoDevolucionGen($row['idEstadoDevolucionGeneral'], 
            $row['descripcionEstadoDevolucionGeneral']);
        }
        return $rows;   
    }      
    
    /**
     * Actualiza la información del estado de devolucion general.
     * NO se requiere en el sistema.
    **/
    function actualizarEstadoDevolucionGen(){
        $queryUpdate = "UPDATE estadodevoluciongeneral SET descripcionEstadoDevolucionGeneral = '{$this->descripcionEstadoDevolucionGeneral}' WHERE idEstadoDevolucionGeneral = '{$this->idEstadoDevolucionGeneral}'";
        $pdo = new Connection();
        $result = $pdo->open()->query($queryUpdate);
        return $result;
    }
    
    /**
     * Elimina un estado de devolucion general de la base de datos.
     * NO se requiere en el sistema.
    **/
    function eliminarEstadoDevolucionGen($idEstadoDevolucionGeneral){
        $id = $idEstadoDevolucionGeneral;
        $pdo = new Connection();
        $queryDelete = "DELETE FROM estadodevoluciongeneral WHERE idEstadoDevolucionGeneral = '{$id}'";        
        $pdo = $pdo->open();
        return $pdo->query($queryDelete);
    }
}