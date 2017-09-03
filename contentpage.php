<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome</title>
</head>

<body>
Here be content :-9s

<hr>
<?php
	if(empty($_SESSION['uid'])){
		echo 'Need to log in to see the secrets....';
	}
	else {
		echo 'Welcome '.$_SESSION['username'].'<br>The answer is 42';
	}
?>
</body>
</html>