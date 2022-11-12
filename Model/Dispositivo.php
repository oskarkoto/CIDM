<!--Modelo de Dispositivo.-->
<?php
include_once "model/Connection.php";
include_once "model/TipoDispositivo.php";
include_once "model/CondicionActual.php";
include_once "model/EstadoInventario.php";

class Dispositivo
{
  public $idDispositivo;
  public $idTipoDispositivo;
  public $idCondicionActual;
  public $idEstadoInventario;
  public $fechaInclusion;

  public function __construct(
    $pidDispositivo = "",
    $pidTipoDispositivo = "",
    $pidCondicionActual = "",
    $pidEstadoInventario = "",
    $pfechaInclusion = ""
  ) {
    $this->idDispositivo = $pidDispositivo;
    $this->idTipoDispositivo = $pidTipoDispositivo;
    $this->idCondicionActual = $pidCondicionActual;
    $this->idEstadoInventario = $pidEstadoInventario;
    $this->fechaInclusion = $pfechaInclusion;
  }

  public function create_Dispositivo()
  {
    try {
      $sql = "INSERT INTO Dispositivo (idDispositivo, idTipoDispositivo, idCondicionActual, idEstadoInventario,fechaInclusion) "
        . "VALUES ('$this->idDispositivo', '$this->idTipoDispositivo','$this->idCondicionActual', '$this->idEstadoInventario', '$this->fechaInclusion')";
      $pdo = new connection();
      $pdo = $pdo->open();
      return $pdo->query($sql);
    } catch (PDOException $ex) {
      echo $ex->getMessage();
    }
    return false;
  }

  public function read_Dispositivo($idDispositivo = 0)
  {
    $rows = []; 
    try {
      $sql = "SELECT * FROM Dispositivo";

      if ($idDispositivo) {
        $sql .= " WHERE idDispositivo='$idDispositivo'";
      }
      $pdo = new connection();
      $pdo = $pdo->open();
      $result = $pdo->query($sql);

      foreach ($result->fetchAll() as $value) {
        $rows[] = new Dispositivo(
        $value['idDispositivo'],
        $value['idTipoDispositivo'],
        $value['idCondicionActual'],
        $value['idEstadoInventario'],
        $value['fechaInclusion']);
      }
    } catch (Exception $ex) {
      error_log("Error en la funcion" . __FUNCTION__ . " en el archivo" . __FILE__ . " con el error " . $ex->getMessage());
    }
    return $rows;
  }

  function seleccionarAllDispositivo(){
    $query = "SELECT * FROM Dispositivo";
    $pdo = new Connection();
    $pdo = $pdo->open();
    $result = $pdo->query($query);
    $rows = [];
    foreach ($result->fetchAll() as $row) {
        $rows[] = new Dispositivo($row['idDispositivo'], $row['idTipoDispositivo'],$row['idCondicionActual'],$row['idEstadoInventario'],$row['fechaInclusion']);
    }
    return $rows;
  }

  public function delete_Dispositivo($idDispositivo = 0)
  {
    $idDispositivo =  ($idDispositivo) ? $idDispositivo : $this->idDispositivo;
    $sql = "DELETE FROM Dispositivo WHERE idDispositivo = '$idDispositivo'";
    $pdo = new connection();
    $pdo = $pdo->open();
    return $pdo->query($sql);
  }

  public function update_Dispositivo()
  {
    $sql = "UPDATE Dispositivo SET idDispositivo = '{$this->idDispositivo}', idTipoDispositivo = '{$this->idTipoDispositivo}', idCondicionActual='{$this->idCondicionActual}', idEstadoInventario='{$this->idEstadoInventario}', fechaInclusion='{$this->fechaInclusion}' WHERE idDispositivo='{$this->idDispositivo}'";
    $pdo = new connection();
    $pdo = $pdo->open();
    return $pdo->query($sql);
  }

  public function update_Dispositivo_condicion()
  { 
    $sql = "UPDATE Dispositivo SET idCondicionActual='{$this->idCondicionActual}',idEstadoInventario='{$this->idEstadoInventario}' WHERE idDispositivo='{$this->idDispositivo}'";
    $pdo = new connection();
    $pdo = $pdo->open();
    return $pdo->query($sql);
  }
  
  public function get_attribute_Dispositivo($idDispositivo)
  {
    try {
      return $this->$idDispositivo;
    } catch (Exception $ex) {
      return NULL;
    }
  }
}
