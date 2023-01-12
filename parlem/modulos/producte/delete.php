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
$datos = $_POST;

// Decodifica y comprueba que exista el usuario
$datos_get = $func->decodifico_get($datos['datos']);
if (!is_array($datos_get)) {
	$result['tipo'] = 'div';
	$result['msg']  = 'Este usuario no existe';
	echo json_encode($result);
	exit;
}

$producte = new cProducte;
$delete = $producte->delete($datos_get['id']);

$result['tipo'] = 'redirect';
$result['url']  =  $URL.'modulos/producte';
$result['msg']  = 'Usuario eliminado correctamente';

echo json_encode($result);
?>
