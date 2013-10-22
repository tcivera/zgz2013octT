<html>
<head></head>
<body>
<p>
<?php
	//Fibonachi de los 20 primeros
	$i0 = 0;
	$i1 = 1;
	$fin = 20;
	print ("<p>F = $i0, $i1");
	for ($i = 1; $i < ($fin - 1); $i++) {
		$resul = $i1 + $i0;
		$i0 = $i1;
		$i1 = $resul;
		print (", $resul");
	}
	
	//Fibonachi hasta el 20
	$i0 = 0;
	$i1 = 1;
	$fin = 20;
	print ("</p>");
	print ("<p>F2 = $i0");
	$resul = $i0 + $i1;
	while ($resul <= $fin) {		
		print (", $resul");
		$resul = $i1 + $i0;
		$i0 = $i1;
		$i1 = $resul;
	}
	print ("</p>");
?>
</p>
</body>
</html>