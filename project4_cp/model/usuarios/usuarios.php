<?php
/**
 * Write user to txt file
 * @param string $fileName Name of the txt file
 * @param string $filePhotoName Name of the photo file
 * @return null
 */
function writeToFile($fileName,$filePhotoName) {
	//Meto en un fichero los datos del post separados por , y si son array separados por |
	$resultado = "";
	foreach ($_POST as $name => $value) {
		if (!is_array($value)) {
			$resultado .= "," . $value;
		} else {
			$resultado .= ",";
			$resul = "";
			foreach ($value as $val) {
				$resul .= "|" . $val;
			}
			$resultado .=substr($resul,1);
		}
	}
	//Meto la foto al final
	$resultado .= "," . $filePhotoName;	
	$resultado= substr($resultado,1) . "\n";
	echo $resultado;
	//Escritura en el fichero
	file_put_contents($fileName, $resultado, FILE_APPEND);
}

/**
 * Reads a file of users and return the data of the user indicated in an array
 * @param int $line Line number
 * @param string $fileName Name of the file
 * @return array Data of the user
 */
function readUserLine($line,$fileName) {
	$result = file_get_contents ($fileName);
	$users = explode("\n",$result);
	$user = explode(",",$users[$line]);
	foreach($user as $key => $value) {
		if(strpos($value,"|") !== false) {
			$value = explode("|",$value);
		} else if ($key == 7 || $key == 9) {
			$value1 = $value;
			$value = array();
			$value[] =$value1;
		}
		$userarray[]=$value;
	}
	return $userarray;	
}

/**
 * Read all the users from file creating an array of users
 * @param string $fileName Name of the file
 * @return array:array An array of users
 */
function readUsers($fileName) {	
	$result = file_get_contents ($fileName);
	$users = array();
	$usersRead = explode("\n",$result);
	$html ="";
	foreach($usersRead as $i => $userRead) {
		$userData = explode(",",$userRead);
		if (count($userData) == 12) {
			$users[] = $userData;
		}
	}
	return $users;
}