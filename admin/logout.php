<?php 
setcookie ("userid", "$user_id", time() - 3600);
setcookie ("username", "$user_name", time() - 3600);
setcookie ("usertitle", "$user_title", time() - 3600);
session_start();
session_destroy();
header("location:../../");
?>
