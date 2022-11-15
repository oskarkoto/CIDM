<!--Modelo de Ingenieros.-->
<?php
include_once "Model/Connection.php";

class Ingeniero
{
  public $idIngeniero;
  public $primerNombre;
  public $segundoNombre;
  public $primerApellido;
  public $segundoApellido;
  public $telefono;
  public $correoElectronico;
  public $direccion;
  public $fechaInclusion;

  public function __construct($idIngeniero = "",$primerNombre = "", $segundoNombre = "", $primerApellido = "", $segundoApellido = "", $telefono = "", $correoElectronico = "", $direccion = "", $fechaInclusion = "") {
    $this->idIngeniero = $idIngeniero;
    $this->primerNombre = $primerNombre;
    $this->segundoNombre = $segundoNombre;
    $this->primerApellido = $primerApellido;
    $this->segundoApellido = $segundoApellido;
    $this->telefono = $telefono;
    $this->correoElectronico = $correoElectronico;
    $this->direccion = $direccion;
    $this->fechaInclusion = $fechaInclusion;
  }

  function create_ingeniero()
  {
    $pdo = new Connection();
    $pdo = $pdo->open();
    $query = "INSERT INTO ingeniero (idIngeniero,primerNombre, segundoNombre, primerApellido, segundoApellido, telefono, correoElectronico, direccion,fechaInclusion) VALUES ('{$this->idIngeniero}','{$this->primerNombre}','{$this->segundoNombre}', '{$this->primerApellido}', '{$this->segundoApellido}','{$this->telefono}', '{$this->correoElectronico}', '{$this->direccion}', '{$this->fechaInclusion}')";
    $result = $pdo->prepare($query);
    return $result->execute();
  }

  function seleccionarAllIngeniero() {
    $query = "SELECT * FROM ingeniero";
    $pdo = new Connection();
    $pdo = $pdo->open();
    $result = $pdo->query($query);
    $rows = [];
    foreach ($result->fetchAll() as $row) {
        $rows[] = new Ingeniero($row['idIngeniero'], $row['primerNombre'],$row['segundoNombre'],$row['primerApellido'],$row['segundoApellido'],$row['telefono'],$row['correoElectronico'],$row['direccion'],$row['fechaInclusion']);
    }
    return $rows;
}      

  function read_ingenieros($idIngeniero = "")
  {
    $rows = []; 
    try {
      $sql = "SELECT * FROM ingeniero";

      if ($idIngeniero) {
        $sql .= " WHERE idIngeniero='$idIngeniero'";
      }
      $pdo = new connection();
      $pdo = $pdo->open();
      $result = $pdo->query($sql);

      foreach ($result->fetchAll() as $value) {
        $rows[] = new Ingeniero(
        $value['idIngeniero'],
        $value['primerNombre'],
        $value['segundoNombre'],
        $value['primerApellido'],
        $value['segundoApellido'],
        $value['telefono'],
        $value['correoElectronico'],
        $value['direccion'],
        $value['fechaInclusion']);
      }
    } catch (Exception $ex) {
      error_log("Error en la funcion" . __FUNCTION__ . " en el archivo" . __FILE__ . " con el error " . $ex->getMessage());
    }
    return $rows;
  }

  function delete_ingenieros($idIngeniero = 0)
  {
    $idIngeniero =  ($idIngeniero) ? $idIngeniero : $this->idIngeniero;
    $sql = "DELETE FROM ingeniero WHERE idIngeniero = '$idIngeniero'";
    $pdo = new connection();
    $pdo = $pdo->open();
    return $pdo->query($sql);
  }

  function update_ingenieros()
  {
    $sql = "UPDATE ingeniero SET primerNombre = '{$this->primerNombre}', segundoNombre = '{$this->segundoNombre}', primerApellido='{$this->primerApellido}', segundoApellido='{$this->segundoApellido}', telefono='{$this->telefono}', correoElectronico='{$this->correoElectronico}', direccion='{$this->direccion}', fechaInclusion='{$this->fechaInclusion}' WHERE idIngeniero='{$this->idIngeniero}'";
    $pdo = new Connection();
    $result = $pdo->open()->query($sql);
    return $result;
  }

  function get_attribute_ingeniero($primerNombre)
  {
    try {
      return $this->$primerNombre;
    } catch (Exception $ex) {
      return NULL;
    }
  }

  function selectLast() {
    $query = "SELECT idIngeniero FROM ingeniero ORDER BY idIngeniero DESC LIMIT 1";
    $pdo = new Connection();
    $pdo = $pdo->open();
    $result = $pdo->query($query);
    $rows = [];
    foreach ($result->fetchAll() as $row) {
        $rows[] = new Ingeniero($row['idIngeniero']);
    }
    return $rows;
}

}
