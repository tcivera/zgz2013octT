<?php


$fileName = $_SERVER['DOCUMENT_ROOT'] . $configuration["users_txt"];
switch($action) {	
	/** INSERT */
	case 'insert':
		if($_POST) {
			$filePhotoName= "";
			if (isset($_FILES) && isset($_FILES['photo'])) {			
				$filePhotoName = uploadFile($_FILES["photo"],$configuration); //Funcion mia
			}
			userToFile($fileName,$filePhotoName);
			header("Location: /usuarios/select");		
		} else {
			include("../views/usuarios/insert.phtml");
		}
		break;
		
		
	/** UPDATE */
	case 'update':
		if($_POST) {
			if(isset($params_array["id"])) {
				$id = $params_array["id"];
				//Obtain the users data from file
				$users = readUsers($fileName);
				//Check if id is a correct value	
				if (is_numeric($id) === true && $id < count($users)) {
					//Photograph
					$delete = false;
					if (isset($_POST['deleteImage'])) {
						$delete = $_POST['deleteImage'];
					}
					$filePhotoName = updatePhoto($_FILES['photo'],$_POST['photo2'], $delete, $configuration);
					//Convert user form data into an array
					$userData = userToArray($filePhotoName);					
					//Change user data
					$users[$id] = $userData;
					//Write the users data in the file
					usersToFile($fileName,$users);
				}
			}			
			header("Location: /usuarios/select");		
		} else {
			if(isset($params_array["id"])) {
				$id = $params_array["id"];
				$user = readUserLine($id,$fileName);
			}
			include("../views/usuarios/insert.phtml");
		}
		break;
		
		
	/** DELETE */
	case 'delete':
		if ($_POST) {
			if(isset($params_array["id"])) {
				$id = $params_array["id"];
				if ($_POST["answer"] == "SI") {
					//Obtain the users data from file
					$users = readUsers($fileName);
					//Check if id is a correct value	
					if (is_numeric($id) === true && $id < count($users)) {
						//Deletes the image
						$image = $users[$id][11];						
						deleteFile($image,$configuration);				
						//Delete the user
						unset($users[$id]);
						//Write the users data in the file
						usersToFile($fileName,$users);
					}
				}
				header("Location: /usuarios/select");
			}
		} else {			
			if(isset($params_array["id"])) {
				$id = $params_array["id"];
				$user = readUserLine($id,$fileName);
				include("../views/usuarios/delete.phtml");
			} else {
				header("Location: /usuarios/select");
			}			
		}
			
		break;
		
		
	/** SELECT */
	case 'select':
	default:	
		//Read users from file
		$users = readUsers($fileName);		
		include("../views/usuarios/usuarios.phtml");
		break;
}