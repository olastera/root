<?php
//para poder mover a cualquier directorio o carpeta una web
ini_set('display_errors', 1);
// Notificar todos los errores de PHP
//Mostrar todos los errores
error_reporting(E_ALL);

date_default_timezone_set("Europe/Madrid");
if(@session_start() == false){session_destroy();session_start();}

global $DOCUMENT_ROOT ;
global $DOCUMENT_ROOT_class ;
// clases
// Path se ha de configurar en dos sitios configuracion.ini
   $path="parlem/";
   $DOCUMENT_ROOT_class=$path."classes/";
   //ruta de trabajo
   $PATH_ROOT = $_SERVER["DOCUMENT_ROOT"]."/".$path;

    //var_dump($PATH_ROOT);
    //var_dump($DOCUMENT_ROOT_class);
 ?>
