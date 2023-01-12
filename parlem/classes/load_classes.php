<?php
 ini_set('display_errors', 1);
// Notificar todos los errores de PHP
//Mostrar todos los errores
    error_reporting(E_ALL);

 //var_dump($PATH_ROOT);
//Se requiere el archivo de configuracion
  require_once($PATH_ROOT."/classes/config.php");
  require_once($PATH_ROOT."/classes/class.consultas.php");
  require_once($PATH_ROOT."/classes/class.funciones.php");
  require_once($PATH_ROOT."/classes/class.customer.php");
  require_once($PATH_ROOT."/classes/class.producte.php");
  require_once($PATH_ROOT."/classes/class.paginacion.php");

        $consultas = new cConsultas;
        $func=new Funciones;
        $URL = $consultas->URL;


 ?>
