<?php
//Esto está definido en .htaccess
$state = getenv('APPLICATION_ENV');
if (isset($state)) {
	define('APPLICATION_ENV', $state);
} else {
	define('APPLICATION_ENV', 'production');
}

//Pongo todos los require aqui
require_once ("../model/archivos.php");
require_once ("../model/usuarios/usuarios.php");
require_once ("../model/generalModel.php");

// /controller/action/param/value/param2/value2

//Lectura del fichero de configuracion
$config_file="../configs/config.ini";
$configuration = readConfigFile($config_file,APPLICATION_ENV);

//Empieza la funcionalidad de enrutador
$url = explode("/",$_SERVER['REQUEST_URI']);
$controller = isset($url[1])?$url[1]:"error";
$action = isset($url[2])?$url[2]:"";
$params_array = array();
for ($i = 3; $i < count($url); $i += 2) {
	$params_array[$url[$i]] = isset($url[$i + 1])?$url[$i + 1]:"";
}

//Empieza la funcionalidad de controlador
switch ($controller)
{
	case 'usuarios':
		include_once("../controllers/usuarios.php");
		break;
	default:
		break;
}