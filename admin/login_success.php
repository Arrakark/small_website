<?php
session_start();
if(!isset($_SESSION['username'])){
	header("location:main_login.php");
}
else {
	header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Success!</title>
</head>

<body>
	<p>Click <a href="/admin/">here</a> if you are not redirected.</p>
</body>
</html>