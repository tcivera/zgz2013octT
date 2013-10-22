<html>
<head></head>
<body>
<table border="1">
<?php
	$col = 4;
	$fila = 5;
	for ($i=0; $i <= $fila; $i++) {		
		print("<tr>");		
		if ($i == 0) {
			print("<td></td>");
		} else {
			print("<td>$i</td>");
		}
		for ($j=1; $j <= $col; $j++) {			
			if ($i == 0) {
				print("<td>$j</td>");
			} else {
				$mult = $i * $j;
				print("<td>$mult</td>");
			}
		}
		print("</tr>");		
	}	
?>
</table>
</body>
</html>