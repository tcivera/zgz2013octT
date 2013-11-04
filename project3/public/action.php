<html>
<head>
<?php
	echo "<pre>Post:";
	print_r($_POST);
	echo "</pre>";
	echo "<pre>Get:";
	print_r($_GET);
	echo "</pre>";
	
	echo "<pre>Files:";
	print_r($_FILES);
	echo "</pre>";
	
	//Guarda la imagen del formulario en el escritorio	
	$uploads_dir = $_SERVER['DOCUMENT_ROOT'] . "/project3/uploads";	
	move_uploaded_file ($_FILES["photo"]["tmp_name"], $uploads_dir . "/" . $_FILES["photo"]["name"]);
	
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
	$resultado .= ",";
	if (isset($_FILES) && isset($_FILES['photo'])) {
		$resultado .= $_FILES['photo']['name'];
	}
	$resultado= substr($resultado,1) . "\n";
	echo $resultado;
	//Escritura en el fichero
	$nombreFichero = $_SERVER['DOCUMENT_ROOT'] . "/project3/uploads/" . "usuario.txt";
	file_put_contents($nombreFichero, $resultado, FILE_APPEND);
	
	
	//OTRA FORMA DE HACER EL EJERCICIO ANTERIOR
	foreach($_POST as $key => $value) {
		if (is_array($value))
			$value=implode('|',$value);
		$out[]=$value;
	}
	$out[] = $_FILES['photo']['name'];
	
	$text = implode(',',$out);
	header("Location: usuarios.php");
?>
</head>
</html>
