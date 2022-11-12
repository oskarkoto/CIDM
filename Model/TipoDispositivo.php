<!--Modelo de Tecnicos.-->
<?php
include_once "Model/Connection.php";

class TipoDispositivo
{
  public $idTipoDispositivo;
  public $nombreTipoDispositivo;
  public $descripcionTipoDispositivo;
  public $marcaTipoDispositivo;
  public $existenciaMinima;

  public function __construct(
    $pidTipoDispositivo = "",
    $pnombreTipoDispositivo = "",
    $pdescripcionTipoDispositivo = "",
    $pmarcaTipoDispositivo = "",
    $pexistenciaMinima = ""
  ) {
    $this->idTipoDispositivo = $pidTipoDispositivo;
    $this->nombreTipoDispositivo = $pnombreTipoDispositivo;
    $this->descripcionTipoDispositivo = $pdescripcionTipoDispositivo;
    $this->marcaTipoDispositivo = $pmarcaTipoDispositivo;
    $this->existenciaMinima = $pexistenciaMinima;
  }

  public function create_tipo_Dispositivo()
  {
    try {
      $sql = "INSERT INTO tipoDispositivo (idTipoDispositivo, nombreTipoDispositivo, descripcionTipoDispositivo, marcaTipoDispositivo, existenciaMinima) "
        . "VALUES ('$this->idTipoDispositivo', '$this->nombreTipoDispositivo','$this->descripcionTipoDispositivo', '$this->marcaTipoDispositivo', 
        '$this->existenciaMinima')";
      $pdo = new connection();
      $pdo = $pdo->open();
      return $pdo->query($sql);
    } catch (PDOException $ex) {
      echo $ex->getMessage();
    }
    return false;
  }

  public function read_tipo_Dispositivo($idTipoDispositivo = 0)
  {
    $rows = []; 
    try {
      $sql = "SELECT * FROM tipoDispositivo";

      if ($idTipoDispositivo) {
        $sql .= " WHERE idTipoDispositivo='$idTipoDispositivo'";
      }
      $pdo = new connection();
      $pdo = $pdo->open();
      $result = $pdo->query($sql);

      foreach ($result->fetchAll() as $value) {
        $rows[] = new TipoDispositivo(
        $value['idTipoDispositivo'],
        $value['nombreTipoDispositivo'],
        $value['descripcionTipoDispositivo'],
        $value['marcaTipoDispositivo'],
        $value['existenciaMinima']);
      }
    } catch (Exception $ex) {
      error_log("Error en la funcion" . __FUNCTION__ . " en el archivo" . __FILE__ . " con el error " . $ex->getMessage());
    }
    return $rows;
  }

  function seleccionarAllTipoDispositivo(){
    $query = "SELECT * FROM tipoDispositivo";
    $pdo = new Connection();
    $pdo = $pdo->open();
    $result = $pdo->query($query);
    $rows = [];
    foreach ($result->fetchAll() as $row) {
        $rows[] = new TipoDispositivo($row['idTipoDispositivo'], $row['nombreTipoDispositivo'],$row['descripcionTipoDispositivo'],$row['marcaTipoDispositivo'],$row['existenciaMinima']);
    }
    return $rows;
  }

  public function delete_tipo_Dispositivo($idTipoDispositivo = 0)
  {
    $idTipoDispositivo =  ($idTipoDispositivo) ? $idTipoDispositivo : $this->idTipoDispositivo;
    $sql = "DELETE FROM tipoDispositivo WHERE idTipoDispositivo = '$idTipoDispositivo'";
    $pdo = new connection();
    $pdo = $pdo->open();
    return $pdo->query($sql);
  }

  public function update_tipo_Dispositivo()
  {
    $sql = "UPDATE tipoDispositivo SET idTipoDispositivo = '{$this->idTipoDispositivo}', nombreTipoDispositivo = '{$this->nombreTipoDispositivo}', descripcionTipoDispositivo='{$this->descripcionTipoDispositivo}', marcaTipoDispositivo='{$this->marcaTipoDispositivo}', existenciaMinima='{$this->existenciaMinima}' WHERE idTipoDispositivo='{$this->idTipoDispositivo}'";
    $pdo = new connection();
    $pdo = $pdo->open();
    return $pdo->query($sql);
  }
  
  public function get_attribute_Dispositivo($idTipoDispositivo)
  {
    try {
      return $this->$idTipoDispositivo;
    } catch (Exception $ex) {
      return NULL;
    }
  }
}
