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
INSERT INTO  `sw`.`sw_page` (
`page_id` ,
`page_user_id` ,
`page_title` ,
`page_data` ,
`page_timeupdate` ,
`page_timeadd` ,
`page_status` ,
`page_navbar`
)
VALUES (
NULL ,  '$user_id',  '$title',  '$data', NOW( ) , NOW( ) ,  '$draft', '$navbar'
);
");

if ($result) {
	echo "Page Created. Click <a href='/admin/page.php'>here</a> to go back.<meta http-equiv='refresh' content='0; url=/admin/page.php' />";
}

mysql_close($con);
?>