<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>





<?php
	
	
if(filter_input(INPUT_POST, 'submit')){	
	
	$un = filter_input(INPUT_POST, 'un') 
		or die ('Brugernavn er ikke korrekt - Prøv igen');
	
	$pw = filter_input(INPUT_POST, 'pw')
		or die ('Adgangskode er ikke korrekt - Prøv igen');
	
	$pw = password_hash($pw, PASSWORD_DEFAULT);
	
	echo 'User created, click back in your browser to login: <br>' .$un. ' : ' .$pw;
	
	
	
	require_once('db_con.php');
	
	$sql = 'INSERT INTO users (username, password) VALUES (?, ?)';
	
	$stmt = $con->prepare($sql);
			$stmt->bind_param('ss', $un, $pw);
			$stmt->execute();
	
	if($stmt->affected_rows > 0){
		echo '<h1><br>User ' .$un. ' is now added, click back in your browser to login!</h1>';
		
	}
	
	else 'Kunne ikke tilføje bruger - Prøv igen';
			
}	
		
?>
	
<p>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
    	<legend>Create new user</legend>
    	
    	<input name="un" type="text" placeholder="Username" required/>
    	<input name="pw" type="password" required placeholder="Password"/>
    	<input name="submit" type="submit" value="Create user" />
    	<a href="login.php">Login Here</a>
	</fieldset>
</form>
</p>	
	
	

	

</body>
</html>