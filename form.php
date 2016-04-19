<!doctype html>
<html>
<head>
	<title>Simple PHP Captcha</title>
</head>
	<body>
	<form method="POST">
		<img src="captcha.php?height=240&width=60"/><br>
		<input type="text" value="" name="val"/>
		<input type="submit" value="Submit"/>
	</form>
	</body>
</html>

<?php
	session_start();
	if(isset($_POST['val']) && isset($_SESSION['captcha']))
	{
		$val = $_POST['val'];
		if($val==$_SESSION['captcha'])
		{
			echo "YAY! :D";
		}
		else
		{
			echo "NOO! :(";
		}
	}
?>