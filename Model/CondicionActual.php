<!--Modelo de Estado de Condicion Actual.-->
<?php
include_once "Model/Connection.php";

class CondicionActual
{
  public $idCondicionActual ;
  public $descripcionCondicionActual;

  public function __construct($idCondicionActual = "", $descripcionCondicionActual = "") {
    $this->idCondicionActual = $idCondicionActual;
    $this->descripcionCondicionActual = $descripcionCondicionActual;
  }

  public function create_condicionactual()
  {
    try {
      $sql = "INSERT INTO condicionactual (idCondicionActual, descripcionCondicionActual) VALUES ('$this->idCondicionActual', '$this->descripcionCondicionActual')";
      $pdo = new connection();
      $pdo = $pdo->open();
      return $pdo->query($sql);
    } catch (PDOException $ex) {
      echo $ex->getMessage();
    }
    return false;
  }

  public function read_condicionactual($idCondicionActual = 0)
  {
    $rows = []; 
    try {
      $sql = "SELECT * FROM condicionactual";

      if ($idCondicionActual) {
        $sql .= " WHERE idCondicionActual='$idCondicionActual'";
      }
      $pdo = new connection();
      $pdo = $pdo->open();
      $result = $pdo->query($sql);

      foreach ($result->fetchAll() as $value) {
        $rows[] = new CondicionActual($value['idCondicionActual'], $value['descripcionCondicionActual']);
      }
    } catch (Exception $ex) {
      error_log("Error en la funcion" . __FUNCTION__ . " en el archivo" . __FILE__ . " con el error " . $ex->getMessage());
    }
    return $rows;
  }

  function seleccionarAllCondicionActual(){
    $query = "SELECT * FROM condicionactual";
    $pdo = new Connection();
    $pdo = $pdo->open();
    $result = $pdo->query($query);
    $rows = [];
    foreach ($result->fetchAll() as $row) {
        $rows[] = new CondicionActual($row['idCondicionActual'], $row['descripcionCondicionActual']);
    }
    return $rows;
  }

  public function delete_condicionactual($idCondicionActual = 0)
  {
    $idCondicionActual =  ($idCondicionActual) ? $idCondicionActual : $this->idCondicionActual;
    $sql = "DELETE FROM condicionactual WHERE idCondicionActual = '$idCondicionActual'";
    echo $sql;
    $pdo = new connection();
    $pdo = $pdo->open();
    return $pdo->query($sql);
  }

  public function update_condicionactual()
  {
    $sql = "UPDATE condicionactual SET idCondicionActual = '$this->idCondicionActual', descripcionCondicionActual = '$this->descripcionCondicionActual'";
    echo $sql;
    $pdo = new connection();
    $pdo = $pdo->open();
    return $pdo->query($sql);
  }

  public function get_attribute_condicionactual($idCondicionActual)
  {
    try {
      return $this->$idCondicionActual;
    } catch (Exception $ex) {
      return NULL;
    }
  }
}
