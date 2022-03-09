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
        <title>Post Manager</title>
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
            	<li id="select"><a href="post.php">Posts</a><div id="selecttri"></div></li>
                <hr />
            	<li><a href="page.php">Pages</a></li>
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
        	<h2>Posts</h2>
            <p>Edit or create single post entries.</p>
            <div id="widget">
            	<div id="widget_title"><h3>Post List</h3></div>
            	<div id="widget_body">
                <form>
                	<table style="margin:15px;" width="870">
                    	<tr>
                            <td>Title</td>
                            <td>Content</td>
                            <td>Category</td>
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
								$postnumber=$_GET['pag']*5;
								$linkpag=$_GET['pag'];
								$result1=mysql_query("SELECT * 
								FROM  `$db`.`sw_post`
								ORDER BY  `sw_post`.`post_timeupdate` DESC 
								LIMIT $postnumber , 5");
								if (!$result1)
								{
									echo "<h2>No Posts!</h2>";
								}
								else
								{
									$num1=mysql_num_rows($result1);	
									$i1=0;
									while ($num1 > $i1)
									{
										$post_id=mysql_result($result1,$i1,"post_id");
										$post_user_id=mysql_result($result1,$i1,"post_user_id");
										$post_title=mysql_result($result1,$i1,"post_title");
										$post_data=substr(strip_tags(mysql_result($result1,$i1,"post_data")),0,90);
										$post_timeadd=mysql_result($result1,$i1,"post_timeadd");
										$post_status=mysql_result($result1,$i1,"post_status");
										$post_cat_id=mysql_result($result1,$i1,"post_cat_id");
										$result2=mysql_query("SELECT * 
										FROM  `$db`.`sw_user` 
										WHERE  `user_id` =$post_user_id
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
												$result3=mysql_query("SELECT * 
												FROM  `$db`.`sw_cat` 
												WHERE  `cat_id` =$post_cat_id
												LIMIT 0 , 1");
												if (!$result3)
												{
													if ($post_status==TRUE){
															echo "<tr>
															<td>$post_title</td>
															<td>$post_data...</td>
															<td>None</td>
															<td>$user_title</td>
															<td><a href='/admin/post.php?e=$post_id&pag=$linkpag'><img src='icon/eye.png' /></a></td>
														</tr>";
														}
														else {
															echo "<tr>
															<td id='draft'>$post_title</td>
															<td id='draft'>$post_data...</td>
															<td id='draft'>None</td>
															<td id='draft'>$user_title</td>
															<td id='draft'><a href='/admin/post.php?e=$post_id&pag=$linkpag'><img src='icon/eye.png' /></a></td>
														</tr>";
														}
												}
												else
												{
													$num3=mysql_num_rows($result3);	
													$i3=0;
													while ($num3 > $i3){
														$cat_title=mysql_result($result3,$i3,"cat_title");
														if ($post_status==TRUE){
															echo "<tr>
															<td>$post_title</td>
															<td>$post_data...</td>
															<td>$cat_title</td>
															<td>$user_title</td>
															<td><a href='/admin/post.php?e=$post_id&pag=$linkpag'><img src='icon/eye.png' /></a></td>
														</tr>";
														}
														else {
															echo "<tr>
															<td id='draft'>$post_title</td>
															<td id='draft'>$post_data...</td>
															<td id='draft'>$cat_title</td>
															<td id='draft'>$user_title</td>
															<td id='draft'><a href='/admin/post.php?e=$post_id&pag=$linkpag'><img src='icon/eye.png' /></a></td>
														</tr>";
														}
													$i3++;}}
												$i2++;
											}
										}
										$i1++;
									}
								}
							}
                    echo "
						</table>";
						$result2=mysql_query("SELECT * FROM  `$db`.`sw_post`");
						$num2=mysql_num_rows($result2);
						$page=ceil($num2/5);
						$pagei1=0;
						echo "<p style='margin-left:15px; margin-right:15px;'>Page: ";
						while ($page > $pagei1)
						{
							echo "<a href='/admin/post.php?pag=$pagei1' class='pagelink'>$pagei1</a> ";
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
						$post_id_edit=$_GET['e'];
						$result1=mysql_query("SELECT * 
						FROM  `sw`.`sw_post` 
						WHERE  `post_id` =$post_id_edit
						LIMIT 0 , 30");
						$num1=mysql_num_rows($result1);	
						$i1=0;
						while ($num1 > $i1)
						{
							$post_id=mysql_result($result1,$i1,"post_id");
							$post_title=mysql_result($result1,$i1,"post_title");
							$post_data=mysql_result($result1,$i1,"post_data");
							$post_timeadd=mysql_result($result1,$i1,"post_timeadd");
							$post_cat_id=mysql_result($result1,$i1,"post_cat_id");
							$post_status=mysql_result($result1,$i1,"post_status");
							if (empty($post_cat_id)) {
								$post_cat_id="NULL";	
							}
							echo "<div id='widget_title'><h3>Edit Post: <a href='/admin/post.php'>New Post</a></h3></div>
							<div id='widget_body'>
							<form style='margin:15px;' method='post' action='updatepost.php'>
							<table style='width:867px;'>
							<tr>
							<td>Title</td>
							<td><input type='text' name='title' value='$post_title'/><input type='hidden' value='$post_id' name='id' /></td>
							</tr>
							<tr>
							<td style='text-align:left; vertical-align:top;'>HTML</td>
							<td><textarea name='data' cols='30' style='width:788px; margin-left:2px; height:200px; font-family:Arial, Helvetica, sans-serif;'>$post_data</textarea></td>
							</tr>
							<tr>
							<td colspan='2'>
							Category:
							<select name='category'>
							<option value='$post_cat_id'>Keep Category</option>
							<option value='NULL'>None</option>
							";
							$result2=mysql_query("SELECT * 
							FROM  `sw`.`sw_cat` 
							WHERE  `cat_status` =1
							LIMIT 0 , 30");
							$num2=mysql_num_rows($result2);	
							$i2=0;
							while ($num2 > $i2)
							{ 
								$cat_id=mysql_result($result2,$i2,"cat_id");
								$cat_title=mysql_result($result2,$i2,"cat_title");
								echo "<option value='$cat_id'>$cat_title</option>";
								$i2++;
							}
							if ($post_status!=1) {
								$checked="checked";
							}
							else {
								$checked="";
							}
							echo "</select>
							Draft:<input type='checkbox' name='draft' $checked/>
							<a href='/admin/deletepost.php?id=$post_id'>Delete Forever</a>
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
					echo "<div id='widget_title'><h3>New Post</h3></div>
            	<div id='widget_body'>
                	<form style='margin:15px;' method='post' action='createpost.php'>
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
                                	Category:
                                	<select name='category'>
							";
							$result2=mysql_query("SELECT * 
							FROM  `sw`.`sw_cat` 
							WHERE  `cat_status` =1
							LIMIT 0 , 30");
							$num2=mysql_num_rows($result2);	
							$i2=0;
							while ($num2 > $i2)
							{ 
								$cat_id=mysql_result($result2,$i2,"cat_id");
								$cat_title=mysql_result($result2,$i2,"cat_title");
								echo "<option value='$cat_id'>$cat_title</option>";
								$i2++;
							}
							if ($post_status!=1) {
								$post_status="checked";
							}
							else {
								$post_status="";
							}
							echo "<option value='NULL'>None</option>
                                    </select>
							Draft:<input type='checkbox' name='draft'/>
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