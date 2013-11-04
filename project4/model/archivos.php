<?php
/**
 * Upload a file to uploads directory
 * @param array $array_files Array with the file information
 * @return string filename
 */
function uploadFile($array_files,$configuration) {
	//Save the form image
	$uploads_dir = $_SERVER['DOCUMENT_ROOT'] .  $configuration["upload_dir"];
	$name = $array_files["name"];	
	$names = explode(".",$name);
	$i = 0;	
	//Otra opcion puede ser leer todos los archivos de la carpeta en un array()	
	while (file_exists($uploads_dir . "/" . $name)) {
		$name = $names[0] . "_" . $i . "." . $names[1];
		/* Otra manera
		 * $file_info = pathinfo($array_files["name"]);
		 * $name = $file_info['filename'] . "_" . $i . "." . $file_info['extension'];
		 */
		$i++;
	}
	move_uploaded_file ($array_files["tmp_name"], $uploads_dir . "/" .$name);		
	return $name;
}

/**
 * Upload a file to uploads directory
 * @param array $array_files Array with the file information
 * @param string $oldPhoto Old photo name
 * @param boolean $delete If the old photo must be deleted
 * @return string filename
 */
function updatePhoto($array_files, $oldPhoto, $delete, $configuration) {
	$filePhotoName=$oldPhoto;
	$uploads_dir = $_SERVER['DOCUMENT_ROOT'] . $configuration["upload_dir"] . "/";
	if (isset($array_files) && isset($array_files['error'])
		&& $array_files['error'] == UPLOAD_ERR_OK) {
			unlink($uploads_dir . $filePhotoName);
			$filePhotoName = uploadFile($array_files,$configuration);			
	} else if ($delete) {
		unlink($uploads_dir . $filePhotoName);
		$filePhotoName = "";
	}
	return $filePhotoName;
}

/**
 * Deletes a file
 * @param string $file Name of the file
 */
function deleteFile($file,$configuration) {
	//Save the form image
	if ($file != "") {
		$uploads_dir = $_SERVER['DOCUMENT_ROOT'] . $configuration["upload_dir"] . "/";
		unlink($uploads_dir . $file);
	}
}

/**
 * Print a debug of the array
 * @param aray $array Array to debug
 * @return null
 */
function debug($array) {
	print("<pre>");
	print_r($array);
	print("</pre>");
}