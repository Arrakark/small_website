<?php
include "protect.php";
include "../php/connect.php";
error_reporting(0);
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	die("Server Died");
}

$draft= $_POST['draft'];

if (empty($draft)) {
	$draft=1;
}
else {
	$draft=0;
}

$navbar= $_POST['navbar'];

if ($navbar==NULL) {
	$navbar=0;
}
else {
	$navbar=1;
}

$user_id=$_COOKIE["userid"];
$id=$_POST['id'];
$title=mysql_real_escape_string($_POST['title']);
$data=mysql_real_escape_string($_POST['data']);

$result=mysql_query("
UPDATE  `$db`.`sw_page` 
SET  
	`page_user_id` =  '$user_id',
	`page_title` =  '$title',
	`page_data` =  '$data',
	`page_status` =  $draft,
	`page_navbar` =  $navbar,
	`page_timeupdate` = NOW( ) 
WHERE  `$db`.`sw_page`.`page_id` =$id;");

if ($result) {
	echo "Changes Submitted. Click <a href='/admin/page.php'>here</a> to go back.<meta http-equiv='refresh' content='0; url=/admin/page.php' />";
}

mysql_close($con);
?>