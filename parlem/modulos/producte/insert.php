<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/inc_parlem/ini.php");
require_once($PATH_ROOT."/classes/load_classes.php");

$result = array(
	'url' => $URL.'modulos/producte',
	'tipo' => 'div',
	'msg' => 'Ha ocurrido un error'
);

$comprueba_errores = '';
$hay_revistas = 0;

//var_dump2($_POST); 

$datos = $_POST;
if ( !empty($datos['productName']) && !empty($datos['productTypeName']) && !empty($datos['numeracioTerminal'])  ) {
	$producte = new cProducte;
 
  
		$insert = $producte->insert($datos);

		if ($insert) {
 			$result['tipo'] = 'ok';
			$result['msg']  = 'Producte correctamente';
		} else {
			$result['tipo'] = 'div';
			$result['msg'] = 'Algo raro ha ocurrido...';
		}
	  

} else {
	$result['msg'] = 'Hay campos vacíos';
}

echo json_encode($result);
?>
