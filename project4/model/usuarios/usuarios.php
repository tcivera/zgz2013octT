<?php
/**
 * Write user to string
 * @param string $filePhotoName Name of the photo file
 * @return string The user data
 */
function userToLine($fileName,$filePhotoName) {
	//Convert user data in a text line separated by , and arrays by |
	$resultado = "";
	foreach ($_POST as $name => $value) {
		if ($name != "photo2") {
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
	}
	//Write photo at end
	$resultado .= "," . $filePhotoName;	
	$resultado= substr($resultado,1);
	return $resultado;
}

/**
 * Write user to txt file
 * @param string $fileName Name of the txt file
 * @param string $filePhotoName Name of the photo file
 * @return null
 */
function userToFile($fileName,$filePhotoName) {
	$resultado = userToLine($fileName,$filePhotoName) . "\n";
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

/**
 * Write user to array
 * @param string $filePhotoName Name of the photo file
 * @return array The user data
 */
function userToArray($filePhotoName) {
	//Convert user data in a array
	$resultado = array();
	foreach ($_POST as $name => $value) {
		if (is_array($value)) {			
			$resul = "";
			foreach ($value as $val) {
				//The array values are converted into a string separated by |
				$resul .= "|" . $val;
			}
			$value = substr($resul,1);
		}
		if ($name != "photo2" &&$name != "deleteImage") {
			$resultado[] = $value;
		}
	}
	//Puts photo at end
	$resultado[] = $filePhotoName;	
	return $resultado;
}

/**
 * Write users into a file overwriting file data
 * @param string $fileName Name of the file
 * @param array $users Array with the users
 * @return null
 */
function usersToFile($fileName,$users) {
	//Convert users in a string	
	$result = "";
	foreach ($users as $value) {
		$userLine = implode(",",$value);
		$result .= $userLine . "\n";		
	}
	//Write the file
	file_put_contents($fileName, $result);
}