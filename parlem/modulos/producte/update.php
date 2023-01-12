<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/inc_parlem/ini.php");
require_once($PATH_ROOT."/classes/load_classes.php");

$result = array(
	'url' => $URL.'modulos/users',
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
	//echo json_encode($result);
	exit;
}
unset($datos['datos']);
$users = new cUsers;
 if (!empty($datos['name']) && !empty($datos['username'])   && !empty($datos['role'])) {

   $test['nombre'] = $users->comprueba_nombre($datos['name']);
	 //$test['usuario'] = $users->comprueba_usuario($datos['username'],$datos_get['id']);


	if($datos['password']) {
  	$test['contraseña'] = $users->comprueba_contrasena($datos['password']);
   }
  $test['rol'] = $users->comprueba_rol($datos['role']);


	 $comprueba_errores = $func->comprueba_errores($test);

	if ($comprueba_errores===0) {
		$datos['password'] = md5($datos['password']);

		unset($datos['revistas']);
		$where['id'] = $datos_get['id'];
 	$insert = $users->update_usuario($datos, $where);
		if ($insert) {
 			$result['tipo'] = 'redirect';
			$result['msg']  = 'Usuario editado correctamente';
		  $result['url']  = $URL.'modulos/users';

		} else {
			$result['tipo'] = 'div';
			$result['msg'] = 'Algo raro ha ocurrido...';
		}
	} else {
		$result['tipo'] = 'div';
		$result['msg']  = $comprueba_errores;
	}

} else {
	$result['msg'] = 'Hay campos vacíos';
}

echo json_encode($result);
?>
