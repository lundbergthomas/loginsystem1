<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

	<?php
	
		$namelist = array('Manfred', 'Rold', 'Jesper');
		
		

	?>
	
	<table border="2">
		<tr><th>Name</th></tr>
	<?php
		foreach($namelist as $nam) {
			echo '<tr><td>'.$nam.'</td></tr>';
			echo $_SERVER["PHP_SELF"];
				foreach ($_SERVER as $k => $v){
					echo ".$k."] = ".$v."<br>";
;				}
		}
	?>
	</table>

</body>
</html>