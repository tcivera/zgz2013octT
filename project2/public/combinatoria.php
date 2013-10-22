<html>
<head></head>
<body>
<p>
<?php
	//Combinatoria
	$n = 16;
	$r = 3;
	
	function factorial($a) {		
		$resul = $a;
		while ($a > 1) {
			$a = $a - 1;
			$resul = $resul * $a;						
		}
		return $resul;
	}
	//(n!) / (r! * (n -r)!)   560   n=16 r=3
	
	$resultado = (factorial($n)) / (factorial($r) * factorial($n - $r));	
	print ($resultado);
?>
</p>
</body>
</html>