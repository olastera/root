<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/inc_parlem/ini.php");
require_once($PATH_ROOT."/classes/load_classes.php");


  // Decodifica y comprueba que exista el usuario
  if (isset($_GET['datos'])) {
    $datos_get = $func->decodifico_get($_GET['datos']);
    if (!is_array($datos_get)) {
       header('Location: '.$URL.'modulos/customer');
    } else {
      $arrayId = array('id' =>$datos_get['id']);
      $customer = new cCustomer;
      $lista = $customer->consulta($arrayId);
      if (count($lista) != 1) {
        header('Location: ' . $URL . 'modulos/customer');
      }


    $result["customer"] = $lista[0];

      //lista de productos
       $productos = $customer->select_producto($datos_get['id']);
       if($productos) {
       $result["productos"] = $productos[0];
      }
      
    }
  } else {
    header('Location: '.$URL.'modulos/customer');
  }

echo json_encode($result);
//var_dump2($result);

    ?>

  