<?php
error_reporting(0);
$email=addslashes(strip_tags($_POST['email']));
$data=addslashes(strip_tags($_POST['data']));
$post_id=addslashes(strip_tags($_POST['post_id']));
$ip=addslashes(strip_tags($_SERVER['REMOTE_ADDR']));
$back=$_SERVER['HTTP_REFERER'];
date_default_timezone_set('America/Los_Angeles');
if (empty($post_id)) {
	$post_id="NULL";
}

if ($_POST['data'] != strip_tags($_POST['data'])) {
	die("Spam detected. Click <a href='$back'>here</a> to go back.<meta http-equiv='refresh' content='3; url=$back' />");
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
  	die("Email is not valid. Click <a href='$back'>here</a> to go back.<meta http-equiv='refresh' content='3; url=$back' />");
}

if (empty($email) or empty($data) or empty($ip) or empty($back)) {
	die("A field is blank. Click <a href='$back'>here</a> to go back.<meta http-equiv='refresh' content='3; url=$back' />");
}

include "connect.php";
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	die("Sever Died");
}

$time = time() - 600;
$acceptdate= date("Y-m-d H:i:s",$time);

$sqlcheck=mysql_query("
SELECT * 
FROM  `sw`.`sw_comment` 
WHERE  `comment_user_ip` =  '$ip'
ORDER BY  `sw_comment`.`comment_timeupdate` DESC 
LIMIT 0 , 1");
$num1=mysql_num_rows($sqlcheck);	
$i1=0;
while ($num1 > $i1)
{
	$comment_timeadd=mysql_result($sqlcheck,$i1,"comment_timeadd");
	if ($comment_timeadd > $acceptdate) {
		die("Commenting too fast! Slow down! Click <a href='$back'>here</a> to go back.<meta http-equiv='refresh' content='3; url=$back' />");
	}
	$i1++;
}

$sql=mysql_query(
"INSERT INTO `sw`.`sw_comment` 
(
	`comment_id`, 
	`comment_email`, 
	`comment_data`, 
	`comment_timeupdate`, 
	`comment_timeadd`, 
	`comment_post_id`, 
	`comment_status`, 
	`comment_user_ip`
) 
VALUES 
(
	NULL, 
	'$email', 
	'$data', 
	NOW(), 
	NOW(), 
	$post_id,
	'1',
	'$ip'
);");
if (!$sql){
	die("Generic Error");
}
echo "Comment Success. <br /><meta http-equiv='refresh' content='0; url=$back' />";
echo "Click <a href='$back'>here</a> if you are not redirected.";
?>