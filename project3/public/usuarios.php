<html>
<head>

</head>
<body>
<a href='formulario.php'>Insertar usuario</a>
<table border="1">
<tr>
<th>id</th>
<th>Nombre</th>
<th>Email</th>
<th>Password</th>
<th>Dirección</th>
<th>Teléfono</th>
<th>Descripción</th>
<th>Tecnologías</th>
<th>Mascota</th>
<th>Idiomas</th>
<th>Ciudad</th>
<th>Foto</th>
<th>Opciones</th>
</tr>
<?php 	
	foreach($users as $usuario) {	
		$datosUsuario = explode(",",$usuario);
		if (count($datosUsuario) == 12) {
			print("<tr>");
			foreach($datosUsuario as $key => $dato) {
				if ($key < (count($datosUsuario) - 1)) {
					print("<td>$dato</td>");
				} else {
					$rutaImagen = "../uploads/" . $dato;
					print("<td><img src='$rutaImagen' height='40px' /></td>");
				}
			}
			print("<td>");
			echo("<a href='formulario.php'>Update</a>");
			echo(" <a href='delete.php'>Delete</a>");
			print("</td>");
			print("</tr>");	
		}
	}
?>
</table>
</body>
</html>