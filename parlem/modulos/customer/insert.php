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
if (!empty($datos['name']) && !empty($datos['username']) && !empty($datos['password']) && !empty($datos['role'])) {
	$users = new cUsers;

  $test['nombre'] = $users->comprueba_nombre($datos['name']);
	$test['usuario'] = $users->comprueba_usuario($datos['username']);
	$test['contraseña'] = $users->comprueba_contrasena($datos['password']);
  $test['rol'] = $users->comprueba_rol($datos['role']);


	$comprueba_errores = $func->comprueba_errores($test);

	if ($comprueba_errores===0) {
		$datos['password'] = md5($datos['password']);
		if (!empty($datos['revistas'])) {
			$revistas = $datos['revistas'];
			$hay_revistas = 1;
		}
		unset($datos['revistas']);
		$insert = $users->insert_usuario($datos);
		if ($insert) {
			if ($datos['role']=='user' || $datos['role']=='editor') {
				if ($hay_revistas==1) {
					$r['user_revista_user'] = $insert;
					foreach ($revistas as $key => $value) {
						$r['user_revista_revista'] = $value;
						$users->insert_usuario_revistas($r);
					}
				}
			}
			$result['tipo'] = 'ok';
			$result['msg']  = 'Usuario correctamente';
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
