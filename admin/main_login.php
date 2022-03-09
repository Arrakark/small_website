<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admin Login</title>
        <link rel="stylesheet" href="../css/admin.css" />
    </head>
    <body>
    	<div id="login_wrapper">
          <h2>Admin Login:</h2>
          <hr />
              <form name="main_login" method="post" action="checklogin.php">
                  <table>
                      <tr>
                          <td>Username:</td>
                          <td><input type="text" name="username" id="username" /></td>
                      </tr>
                      <tr>
                          <td>Password:</td>
                          <td><input type="password" name="password" id="password" /></td>
                      </tr>
                      <tr>
                          <td><!--<div id="error_text">Invalid Login!</div>-->
                          	<?php
								session_start();
								if (isset($_SESSION['username'])){
									echo "<a href='/admin/'>Already logged in.</a>";
								}
							?>
                          </td>
                          <td height="28px"><input type="submit" style="float:right;" /></td>
                      </tr>
                  </table>
              </form>
        </div>
    </body>
</html>