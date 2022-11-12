<!--Modelo de Estado de Inventario.-->
<?php
include_once "Model/Connection.php";

class EstadoInventario
{
  public $idEstadoInventario;
  public $descripcionEstadoInventario;

  public function __construct($idEstadoInventario = "", $descripcionEstadoInventario = "") {
    $this->idEstadoInventario = $idEstadoInventario;
    $this->descripcionEstadoInventario = $descripcionEstadoInventario;
  }

  public function create_estadoinventario()
  {
    try {
      $sql = "INSERT INTO estadoinventario (idEstadoInventario, descripcionEstadoInventario) VALUES ('$this->idEstadoInventario', '$this->descripcionEstadoInventario')";
      $pdo = new connection();
      $pdo = $pdo->open();
      return $pdo->query($sql);
    } catch (PDOException $ex) {
      echo $ex->getMessage();
    }
    return false;
  }

  public function read_estadoinventario($idEstadoInventario = 0)
  {
    $rows = []; 
    try {
      $sql = "SELECT * FROM estadoinventario";

      if ($idEstadoInventario) {
        $sql .= " WHERE idEstadoInventario='$idEstadoInventario'";
      }
      $pdo = new connection();
      $pdo = $pdo->open();
      $result = $pdo->query($sql);

      foreach ($result->fetchAll() as $value) {
        $rows[] = new EstadoInventario($value['idEstadoInventario'], $value['descripcionEstadoInventario']);
      }
    } catch (Exception $ex) {
      error_log("Error en la funcion" . __FUNCTION__ . " en el archivo" . __FILE__ . " con el error " . $ex->getMessage());
    }
    return $rows;
  }

  function seleccionarAllEstadoInventario(){
    $query = "SELECT * FROM estadoinventario";
    $pdo = new Connection();
    $pdo = $pdo->open();
    $result = $pdo->query($query);
    $rows = [];
    foreach ($result->fetchAll() as $row) {
        $rows[] = new EstadoInventario($row['idEstadoInventario'], $row['descripcionEstadoInventario']);
    }
    return $rows;
  }

  public function delete_estadoinventario($idEstadoInventario = 0)
  {
    $idEstadoInventario =  ($idEstadoInventario) ? $idEstadoInventario : $this->idEstadoInventario;
    $sql = "DELETE FROM estadoinventario WHERE idEstadoInventario = '$idEstadoInventario'";
    $pdo = new connection();
    $pdo = $pdo->open();
    return $pdo->query($sql);
  }

  public function update_estadoinventario()
  {
    $sql = "UPDATE estadoinventario SET idEstadoInventario = '$this->idEstadoInventario', descripcionEstadoInventario = '$this->descripcionEstadoInventario'";
    echo $sql;
    $pdo = new connection();
    $pdo = $pdo->open();
    return $pdo->query($sql);
  }

  public function get_attribute_estadoinventario($idEstadoInventario)
  {
    try {
      return $this->$idEstadoInventario;
    } catch (Exception $ex) {
      return NULL;
    }
  }
}
