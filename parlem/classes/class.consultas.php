<?php

class cConsultas extends configuracion {
  var $URL;
  var $URL_admin;
  private $conexion;

  public function __construct() {
    $this->conexion = parent::conectar(); // Creo una variable con la conexión
    $this->URL = parent::get_URL();
    $this->URL_admin = parent::get_URL_admin();
    return $this->conexion;
  }

  public function obtenerValues($array) {
    $values = "";
    foreach ($array as $clave => $valor) {
      $values.= " :".$clave.",";
    }
    $values = substr($values, 0, -1); // Le quito la ultima coma
    return $values;
  }

  public function obtenerColumn($array) {
    $values = "";
    foreach ($array as $clave => $valor) {
      $values.= "".$clave.",";
    }
    $values = substr($values, 0, -1); // Le quito la ultima coma
    return $values;
  }

  public function obtenerUpdate($array,$where) {
    $values['values'] = "";
    foreach ($array as $clave => $valor) {
      $values['values'].= $clave." = :".$clave.",";
    }
    $values['values'] = substr($values['values'], 0, -1); // Le quito la ultima coma
    $values['where'] = "";
    foreach ($where as $clave => $valor) {
      $values['where'].= $clave." = :".$clave." ";
    }
    return $values;
  }

  public function obtenerWhere($array) {
    $values['where'] = "";
    $n = count($array);
    $c = 1;
    foreach ($array as $clave => $valor) {
      $values['where'].= $clave." = :".$clave." ";
      if ($c<$n) {
        $values['where'].= " AND ";
      }
      $c++;
    }
    return $values;
  }

  function lastID($tabla) {
    $consulta = "SELECT MAX(id) as id FROM ".$tabla."";
    $valores = NULL;
    $result = $this->consultarBD($consulta,$valores);
    if($result) {
      return $result[0]['id'];
    }
  }

  public function consultarBD($consulta, $valores = array()) {
    $resultado = false;
    if ($statement = $this->conexion->prepare($consulta)) {  // Prepara la consulta
      if (preg_match_all("/(:\w+)/", $consulta, $campo, PREG_PATTERN_ORDER)) { // Tomo los nombres de los campos iniciados con :xxxxx
        $campo = array_pop($campo); // Inserto en un array
        foreach($campo as $parametro) {
          $statement->bindValue($parametro, $valores[substr($parametro,1)]);
        }
      }
      try {
        if (!$statement->execute()) {
          // Si no se ejecuta la consulta
          $resultado['status']="Ko";
          $resultado['error']=$statement->errorInfo();
           var_dump($statement->errorInfo()) ;
        }
        $resultado = $statement->fetchAll(PDO::FETCH_ASSOC); // Si es una consulta que devuelve valores los guarda en un array.
        $statement->closeCursor();
      }
      catch(PDOException $e) {

      }
    }
    return $resultado;
    $this->conexion = null; // Cerramos la conexión
  }

  function consulta_where($array,$table,$order=" order by id desc") {

    $where["where"] = "1=1";

    if ($array) {
      $where = $this -> obtenerWhere($array);
    }
    $consulta="SELECT * FROM $table WHERE ".$where ["where"]. $order;
    //  echo $consulta;
    $result = $this->consultarBD($consulta,$array);
    return $result;
  }

  function insert($POST, $table) {
    $values = $this->obtenerValues($POST);
    $colum = $this->obtenerColumn($POST);
    $consulta = "INSERT INTO $table ($colum) VALUES ( $values )";
    // var_dump($consulta);
    $registrar = $this->consultarBD($consulta, $POST);
    // var_dump($registrar);
    if (empty($registrar['status'])) {
      return $this->lastID($table);
    } else {
      return 0;
    }
  }

  public function update($POST,$where,$table){
    $values = $this->obtenerUpdate($POST,$where);
    $result = array_merge($POST, $where);
    $consulta = "UPDATE $table SET ".$values['values']." WHERE ".$values['where'];
      //echo $consulta;
    $registrar = $this->consultarBD($consulta, $result);
    if($registrar !== false){
      return true;
    } else {
      return false;
    }
  }



  function delete($tabla,$id) {
    $consulta = "delete from ".$tabla ." where ".$id;
    // echo $consulta;
    $result = $this->consultarBD($consulta,$id);
    return $result;
  }
}
?>
