<?php
include "protect.php";
include "../php/connect.php";
error_reporting(0);
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	die("Server Died");
}

$page_id=$_GET['id'];

$result=mysql_query("
DELETE FROM `sw`.`sw_page` WHERE `sw_page`.`page_id` = $page_id");

if ($result) {
	echo "Page Deleted. Click <a href='/admin/page.php'>here</a> to go back.<meta http-equiv='refresh' content='0; url=/admin/page.php' />";
}

mysql_close($con);
?>