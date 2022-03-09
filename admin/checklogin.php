<?php

$host="localhost";
$username="root"; 
$password="az0res";
$db_name="sw";
$tbl_name="sw_user"; 

mysql_connect("$host", "$username", "$password")or die("Connection Lost");
mysql_select_db("$db_name")or die("Database Down");

$username=$_POST['username'];
$password=$_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM $tbl_name WHERE user_name='$username' and user_pass='$password'";
$result=mysql_query($sql);
$num=mysql_num_rows($result);
$i=0;
while ($num>$i){
	$user_id=mysql_result($result,$i,"user_id");
	$user_name=mysql_result($result,$i,"user_name");
	$user_title=mysql_result($result,$i,"user_title");
	setcookie ("userid", "$user_id");
	setcookie ("username", "$user_name");
	setcookie ("usertitle", "$user_title");
	$i++;
}

if($num==1){
session_start();

// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION["username"] = $username;
$_SESSION["password"] = $password; 
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
?>