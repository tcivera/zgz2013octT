<html>
<head>

</head>
<body>
	<form method="post" name="userRegister" action="action.php" ENCTYPE="multipart/form-data">
		<div>			
			<input type="hidden" name="id" value="1234746" />
		</div>
		<div>
			<label>Nombre:</label>
			<input type="text" name="name" />
		</div>
		<div>
			<label>Email:</label>
			<input type="text" name="email" />
		</div>
		<div>
			<label>Password:</label>
			<input type="password" name="password" />
		</div>
		<div>
			<label>Direcci�n:</label>
			<input type="text" name="address" />
		</div>
		<div>
			<label>Tel�fono:</label>
			<input type="text" name="phone" />
		</div>
		<div>
			<label>Descripci�n:</label>
			<textarea name="description"></textarea>
		</div>
		<div>
			<label>Fotograf�a:</label>
			<input type="file" name="photo" />
		</div>
		<div>
			<label>Tecnolog�a:</label>
			<label>PHP</label><input type="checkbox" name="technology[]" value="PHP" />
			<label>MySQL</label><input type="checkbox" name="technology[]" value="MYSQL" />
			<label>Java</label><input type="checkbox" name="technology[]" value="JAVA" />
		</div>
		<div>
			<label>Mascotas:</label>
			<label>Perro</label><input type="radio" name="pet" value="Perro" />
			<label>Gato</label><input type="radio" name="pet" value="Gato" />
			<label>Otros</label><input type="radio" name="pet" value="Otros" />
		</div>
		<div>
			<label>Idiomas:</label>
			<select name="language[]"  multiple>
				<option value="ingles">Ingl�s</option>
				<option value="frances">Franc�s</option>
				<option value="aleman">Alem�n</option>
				<option value="italiano">Italiano</option>
			</select>
		</div>
		<div>
			<label>Ciudad:</label>
			<select name="city">
				<option value="zaragoza">Zaragoza</option>
				<option value="barcelona">Barcelona</option>
				<option value="madrid">Madrid</option>
				<option value="valencia">Valencia</option>
			</select>
		</div>
		<div>		
			<input type="reset" value="Limpiar" />	
			<input type="submit" value="Registrarse" />
		</div>
		
	
	
	</form>
</body>
</html>
