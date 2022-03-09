<?php
	error_reporting(0);
	$table="web_track";
	$con=mysql_connect($host, $user, $password);
	if (!$con) {
		echo "TCon Failed";
	}
	$path=$_SERVER['PHP_SELF'];
	$ip=$_SERVER['REMOTE_ADDR'];
	$type=$_SERVER['HTTP_USER_AGENT'];
	if ($ip!="127.0.0.1"){
	$sql = "
	INSERT INTO `$db`.`$table` 
	(
		`id`, `path`, `timestamp`, `ip`, `type` 
	) 
	VALUES 
	( 
		NULL, '$path', CURRENT_TIMESTAMP, '$ip', '$type' 
	)
	";
	$result=mysql_query($sql);
	if (!$result) {
		$sql = "
		INSERT INTO `web_track`.`test` 
		(
			`id`, `path`, `timestamp`, `ip`, `type` 
		) 
		VALUES 
		( 
			NULL, '$path', CURRENT_TIMESTAMP, '$ip', '' 
		)
		";
		$result=mysql_query($sql);
	}
	mysql_close($con);
	}
?>