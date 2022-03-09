<?php
include "protect.php";
include "../php/connect.php";
error_reporting(0);
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	die("Server Died");
}

$post_id=$_GET['id'];

$result=mysql_query("
DELETE FROM `sw`.`sw_post` WHERE `sw_post`.`post_id` = $post_id");

if ($result) {
	echo "Post Deleted. Click <a href='/admin/post.php'>here</a> to go back.<meta http-equiv='refresh' content='0; url=/admin/post.php' />";
}

mysql_close($con);
?>