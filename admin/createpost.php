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


$user_id=$_COOKIE["userid"];
$id=$_POST['id'];
$title=mysql_real_escape_string($_POST['title']);
$data=mysql_real_escape_string($_POST['data']);
$cat=$_POST['category'];


$result=mysql_query("
INSERT INTO  `sw`.`sw_post` (
`post_id` ,
`post_user_id` ,
`post_title` ,
`post_data` ,
`post_timeupdate` ,
`post_timeadd` ,
`post_cat_id` ,
`post_status`
)
VALUES (
NULL ,  '$user_id',  '$title',  '$data', NOW( ) , NOW( ) ,  '$cat',  '$draft'
);
");

if ($result) {
	echo "Post Created. Click <a href='/admin/post.php'>here</a> to go back.<meta http-equiv='refresh' content='0; url=/admin/post.php' />";
}

mysql_close($con);
?>