<?php
/*
 * @author Oscar lastera
 * @copyright 2023
 *
 * #############################
 *   Funciones comunes

 // codigos

*/
include('class.do_dump.php');
class Funciones   //clase principal de conexion y consultas
{

  private $conexion;

  var $query = "";
  var $pag_numregistros = "";
  var $iduser = "";
  var $dir_destino = '';
  var $URL_imagen = '';
  var $URL = '';

  var  $key = '97616463ft316a336171706e343302d7';
  var $iv = '1w676c563671b23c';

  function __construct()
  {
  }

  public function comprueba_errores($array)
  {
    $text = 0;
    foreach ($array as $key => $value) {
      if ($value != 1) {
        $text = ucfirst($key) . ': ' . $value;
        return $text;
      }
    }
    return $text;
  }



  // funcion del programador APP navegador
  // $key = '1261646342316a336171706e343302d7';
  // $iv = '13676a563671a23c';
  //$en = encrypt($data, 'E', $key, $iv);
  //$des = encrypt($en, 'D', $key, $iv);

  function encrypt2($data, $operation, $key = '', $iv = '')
  {
    $method = 'AES-256-CBC';
    if ($operation == "E") {
      $encryptedData = openssl_encrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv);
      return base64_encode($encryptedData);
    } else if ($operation == "D") {
      $data = base64_decode($data);
      $decryptedData = openssl_decrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv);
      return $decryptedData;
    }
    return false;
  }

  //paso un array
  function codifico_get($array)
  {
    $cod = json_encode($array);
    $cod = $this->encrypt2($cod, 'E', $this->key, $this->iv);
    return urlencode($cod);
  }
  function codifico_datos($array)
  {
    $cod = json_encode($array);
    $cod = $this->encrypt2($cod, 'E', $this->key, $this->iv);
    return  $cod;
  }

  function decodifico_get($array)
  {
    $cod = $this->encrypt2($array, 'D', $this->key, $this->iv);
    $cod = json_decode($cod, true);
    return $cod;
  }



  function ico($ico)
  {

    switch ($ico) {
      case "edit":
        return '<i class="bi bi-pen-fill"></i>';
        break;
      case "delete":
        return '<i class="bi bi-trash"></i>';
        break;
      case "chart":
        return '<i class="bi bi-diagram-3-fill"></i>';
        break;
      case "+":
        return '<i class="bi bi-plus-circle"></i>';
        break;
      case "lupa":
        return '<i class="bi bi-search"></i>';
        break;
      case "calc":
        return '   <i class="bi bi-calculator"></i>';
        break;
      case "info":
        return '<i class="bi bi-info-circle-fill"></i>';
        break;

      default:
        return '!!!!';
        break;
    }
  }
}/// TERMINA CLASE fuciones ///
