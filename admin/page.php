<?php
	include "protect.php";
	include "../php/track.php";
	include "../php/connect.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/light-admin.css" media="all" rel="Stylesheet" type="text/css" />
        <title>Page Manager</title>
    </head>
    <body>
      	<div id="sidebar">
        <br />
        	<h2>Small Website</h2>
            <ul>
            	<h3>Basics</h3>
            	<li><a href="index.php">Control Panel</a></li>
                <hr />
            	<li><a href="logout.php">Logout</a></li>
                <hr />
            </ul>
            <ul>
            	<h3>Content</h3>
            	<li><a href="post.php">Posts</a></li>
                <hr />
            	<li id="select"><a href="page.php">Pages</a><div id="selecttri"></div></li>
                <hr />
                <li><a href="cat.php">Category</a></li>
                <hr />
                <li><a href="media.php">Media</a></li>
                <hr />
            </ul>
            <ul>
            	<h3>Administration</h3>
            	<li><a href="comment.php">Comments</a></li>
                <hr />
            	<li><a href="footer.php">Footer</a></li>
                <hr />
                <li><a href="setting.php">Settings</a></li>
                <hr />
                <li><a href="user.php">Users</a></li>
                <hr />
                <li><a href="widget.php">Widgets</a></li>
                <hr />
                <li><a href="stats.php">Statistics</a></li>
                <hr />
            </ul>
           	<div id="microtext">© 2012 - 2013 Small Website - Non-Commercial</div>
            <br />
            <br />
        </div>
        <div id="menu">
        	<h2>Pages</h2>
            <p>Edit or create static, information based pages.</p>
            <div id="widget">
            	<div id="widget_title"><h3>Page List</h3></div>
            	<div id="widget_body">
                <form>
                	<table style="margin:15px;" width="870">
                    	<tr>
                            <td>Title</td>
                            <td>Content</td>
                            <td>User</td>
                            <td width="18">Edit</td>
                        </tr>
                        <?php
							$con=mysql_connect($host,$user,$password,$db);
							if (!$con)
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							else 
							{
								$pagenumber=$_GET['pag']*5;
								$linkpag=$_GET['pag'];
								$result1=mysql_query("SELECT * 
								FROM  `$db`.`sw_page`
								ORDER BY  `sw_page`.`page_timeupdate` DESC 
								LIMIT $pagenumber , 5");
								if (!$result1)
								{
									echo "<h2>No pages!</h2>";
								}
								else
								{
									$num1=mysql_num_rows($result1);	
									$i1=0;
									while ($num1 > $i1)
									{
										$page_id=mysql_result($result1,$i1,"page_id");
										$page_user_id=mysql_result($result1,$i1,"page_user_id");
										$page_title=mysql_result($result1,$i1,"page_title");
										$page_data=substr(strip_tags(mysql_result($result1,$i1,"page_data")),0,130);
										$page_timeadd=mysql_result($result1,$i1,"page_timeadd");
										$page_status=mysql_result($result1,$i1,"page_status");
										$page_cat_id=mysql_result($result1,$i1,"page_cat_id");
										$result2=mysql_query("SELECT * 
										FROM  `$db`.`sw_user` 
										WHERE  `user_id` =$page_user_id
										LIMIT 0 , 1");
										if (!$result2)
										{
											
										}
										else
										{
											$num2=mysql_num_rows($result2);	
											$i2=0;
											while ($num2 > $i2){
												$user_name=mysql_result($result2,$i2,"user_name");
												$user_title=mysql_result($result2,$i2,"user_title");
													if ($page_status==TRUE){
															echo "<tr>
															<td>$page_title</td>
															<td>$page_data...</td>
															<td>$user_title</td>
															<td><a href='/admin/page.php?e=$page_id&pag=$linkpag'><img src='icon/eye.png' /></a></td>
														</tr>";
														}
														else {
															echo "<tr>
															<td id='draft'>$page_title</td>
															<td id='draft'>$page_data...</td>
															<td id='draft'>$user_title</td>
															<td id='draft'><a href='/admin/page.php?e=$page_id&pag=$linkpag'><img src='icon/eye.png' /></a></td>
														</tr>";
														}
												$i2++;
											}
										}
										$i1++;
									}
								}
							}
                    echo "
						</table>";
						$result2=mysql_query("SELECT * FROM  `$db`.`sw_page`");
						$num2=mysql_num_rows($result2);
						$page=ceil($num2/5);
						$pagei1=0;
						echo "<p style='margin-left:15px; margin-right:15px;'>Page: ";
						while ($page > $pagei1)
						{
							echo "<a href='/admin/page.php?pag=$pagei1' class='pagelink'>$pagei1</a> ";
							$pagei1++;	
						}
						echo "</p>";
					?>
                </form>
                
                </div>
            </div>
            <br />
            <div id="widget">
            	<?php
				if (!empty($_GET['e'])) {
						$page_id=$_GET['e'];
						$result1=mysql_query("SELECT * 
						FROM  `sw`.`sw_page` 
						WHERE  `page_id` =$page_id
						LIMIT 0 , 30");
						$num1=mysql_num_rows($result1);	
						$i1=0;
						while ($num1 > $i1)
						{
							$page_id=mysql_result($result1,$i1,"page_id");
							$page_title=mysql_result($result1,$i1,"page_title");
							$page_data=mysql_result($result1,$i1,"page_data");
							$page_timeadd=mysql_result($result1,$i1,"page_timeadd");
							$page_cat_id=mysql_result($result1,$i1,"page_cat_id");
							$page_status=mysql_result($result1,$i1,"page_status");
							$page_navbar=mysql_result($result1,$i1,"page_navbar");
							if (empty($page_cat_id)) {
								$page_cat_id="NULL";	
							}
							if ($page_status!=1) {
								$checked="checked";
							}
							else {
								$checked="";
							}
							if ($page_navbar!=1) {
								$navchecked="";
							}
							else {
								$navchecked="checked";
							}
							echo "<div id='widget_title'><h3>Edit Page: <a href='/admin/page.php'>New Page</a></h3></div>
							<div id='widget_body'>
							<form style='margin:15px;' method='post' action='updatepage.php'>
							<table style='width:867px;'>
							<tr>
							<td>Title</td>
							<td><input type='text' name='title' value='$page_title'/><input type='hidden' value='$page_id' name='id' /></td>
							</tr>
							<tr>
							<td style='text-align:left; vertical-align:top;'>HTML</td>
							<td><textarea name='data' cols='30' style='width:788px; margin-left:2px; height:200px; font-family:Arial, Helvetica, sans-serif;'>$page_data</textarea></td>
							</tr>
							<tr>
							<td colspan='2'>
							
							Draft:<input type='checkbox' name='draft' $checked/>
							Navbar:<input type='checkbox' name='navbar' $navchecked/>
							<a href='/admin/deletepage.php?id=$page_id'>Delete Forever</a>
							<input type='submit' style='float:right;'/>
							</td>
							</tr>
							</table>
							</form>
							</div>";
							$i1++;
						}
				}
				else {
					echo "<div id='widget_title'><h3>New Page</h3></div>
            	<div id='widget_body'>
                	<form style='margin:15px;' method='post' action='createpage.php'>
                    	<table style='width:867px;'>
                        	<tr>
                            	<td>Title</td>
                                <td><input type='text' name='title'/></td>
                            </tr>
                            <tr>
                            	<td style='text-align:left; vertical-align:top;'>HTML</td>
                                <td><textarea name='data' cols='30' style='width:788px; margin-left:2px; height:200px; font-family:Arial, Helvetica, sans-serif;'></textarea></td>
                            </tr>
                            <tr>
                            	<td colspan='2'>
                                	
							Draft:<input type='checkbox' name='draft'/>
							Navbar:<input type='checkbox' name='navbar'/>
                                	<input type='submit' style='float:right;'/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>";
				}
				?>
            </div>
        </div>
        <div id="clear"></div>
    </body>
</html>