<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Log In</title>
<link rel="stylesheet" href="stylesheet.css">
</head>

<body>

<?php
if(filter_input(INPUT_POST, 'submit')){
	$un = filter_input(INPUT_POST, 'un') 
		or die('Missing/illegal un parameter');
	$pw = filter_input(INPUT_POST, 'pw')
		or die('Missing/illegal pw parameter');
	require_once('db_con.php');
	$sql = 'SELECT id, password FROM users WHERE username=?';
	$stmt = $con->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($uid, $password);
	
	while($stmt->fetch()) { }
	
	if (password_verify($pw, $password)){
		echo 'Logged in as '.$un;
		$_SESSION['uid'] = $uid;
		$_SESSION['username'] = $un;
		
	}
	else{
		echo 'Illegal username/password combination';
	}
	echo '<hr>';
}
	
?>


<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <legend>Login</legend>
    <input name="un" type="text"     placeholder="Username" required /> <br>
    <input name="pw" type="password" placeholder="Password"   required /> <br>
	<input name="submit" type="submit" value="Login" />
	<a href="contentpage.php">Click here to enter the site if you're logged in succesfully</a>
</form>


</body>
</html>