<!--Modelo de tipo de reporte.-->
<?php
include_once "model/Connection.php";

class TipoReporte {
    
    public $idTipoReporte;
    public $nombreTipoReporte;
    public $detalleTipoReporte;
    public $queryTipoReporte;

    public function __construct($idTipoReporte = 0, $nombreTipoReporte = "",$detalleTipoReporte = "",$queryTipoReporte= "") {
        $this->idTipoReporte = $idTipoReporte;
        $this->nombreTipoReporte = $nombreTipoReporte;
        $this->detalleTipoReporte = $detalleTipoReporte;
        $this->queryTipoReporte = $queryTipoReporte;
    }

    /**
     * Inserta Tipo de Reporte en DB.
    **/
    function insertTipoReporte() {
        $pdo = new Connection();
        $pdo = $pdo->open();
        $query = "INSERT INTO tiporeporte (idTipoReporte, nombreTipoReporte,detalleTipoReporte,queryTipoReporte) VALUES ('{$this->idTipoReporte}','{$this->nombreTipoReporte}','{$this->detalleTipoReporte}','{$this->queryTipoReporte}')";
        $result = $pdo->prepare($query);
        return $result->execute();
    }

    /**
     * Retorna los tipos de reporte disponibles en la base de datos. 
     * Hace una lista de los mismos.
     **/
    function seleccionarAllTipoReporte() {
        $query = "SELECT * FROM tiporeporte";
        $pdo = new Connection();
        $pdo = $pdo->open();
        $result = $pdo->query($query);
        $rows = [];
        foreach ($result->fetchAll() as $row) {
            $rows[] = new TipoReporte($row['idTipoReporte'], $row['nombreTipoReporte'],$row['detalleTipoReporte'],$row['queryTipoReporte']);
        }
        return $rows;
    }         

    /**
     * Retorna un tipo de reporte disponible en la base de datos. 
     * Hace una lista de detalles.
     **/
    function seleccionarTipoReporte($idTipoReporte = "") {
        $query = "SELECT * FROM tiporeporte";
        if ($idTipoReporte) {
            $query .= " where idTipoReporte = '$idTipoReporte'";
        }
        $pdo = new Connection();
        $pdo = $pdo->open();
        $result = $pdo->query($query);
        $rows = [];
        foreach ($result->fetchAll() as $row) {
            $rows[] = new TipoReporte($row['idTipoReporte'], $row['nombreTipoReporte'],
            $row['detalleTipoReporte'],$row['queryTipoReporte']);
        }
        return $rows; 
    }      
    
    /**
     * Actualiza la información del tipo de reporte.
     */
    function actualizarTipoReporte(){  
        $queryUpdate = "UPDATE tiporeporte SET idTipoReporte = '{$this->idTipoReporte}', nombreTipoReporte = '{$this->nombreTipoReporte}', detalleTipoReporte = '{$this->detalleTipoReporte}', queryTipoReporte = '{$this->queryTipoReporte}' WHERE idTipoReporte = '{$this->idTipoReporte}'";
        $pdo = new Connection();
        $result = $pdo->open()->query($queryUpdate);
        return $result;
    }
    
    /**
     * Elimina un reporte de la base de datos.
     */
    function eliminarTipoReporte($idTipoReporte = ""){
        $id = $idTipoReporte;
        $pdo = new Connection();
        //delete categoria de suministro with idCategoria = $idCategoria from categoriaSuministro table
        $queryDelete = "DELETE FROM tiporeporte WHERE idTipoReporte = '{$id}'";        
        $result = $pdo->open()->query($queryDelete);
        return $result->execute();  
    }
}
