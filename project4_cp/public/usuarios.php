<?php
require_once ("../model/archivos.php");
require_once ("../model/usuarios/usuarios.php");
if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action='select';
}
$fileName = $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . "usuario.txt";
switch($action) {	
	/** INSERT */
	case 'insert':
		if($_POST) {
			$filePhotoName= "";
			if (isset($_FILES) && isset($_FILES['photo'])) {			
				$filePhotoName = uploadFile($_FILES["photo"]); //Funcion mia
			}
			writeToFile($fileName,$filePhotoName);
			header("Location: /usuarios.php");		
		} else {
			include("../views/usuarios/insert.phtml");
		}
		break;
		
		
	/** UPDATE */
	case 'update':
		if($_POST) {
			/*$filePhotoName= "";
			if (isset($_FILES) && isset($_FILES['photo'])) {			
				$filePhotoName = uploadFile($_FILES["photo"]); //Funcion mia
			}
			writeToFile($fileName,$filePhotoName);
			header("Location: /usuarios.php");		*/
		} else {
			if(isset($_GET["id"])) {
				$id = $_GET["id"];
				$user = readUserLine($id,$fileName);
				
				//1234746,Tamara,giuweg@sdhosi.es,12345,C/Feghsd n2,657456363,Je eje,PHP|MYSQL,Gato,ingles|frances|aleman,madrid,miFoto.jpg
			}
			include("../views/usuarios/insert.phtml");
		}
		break;
		
		
	/** DELETE */
	case 'delete':
		echo "esto es un delete";
		break;
		
		
	/** SELECT */
	case 'select':
	default:	
		$users = readUsers($fileName);		
		include("../views/usuarios/usuarios.phtml");
		break;
}