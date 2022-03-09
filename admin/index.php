<?php
	include "protect.php";
	include "../php/track.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/light-admin.css" media="all" rel="Stylesheet" type="text/css" />
        <title>Control Panel</title>
    </head>
    <body>
      	<div id="sidebar">
        <br />
        	<h2>Small Website</h2>
            <ul>
            	<h3>Basics</h3>
            	<li id="select"><a href="index.php">Control Panel</a><div id="selecttri"></div></li>
                <hr />
            	<li><a href="logout.php">Logout</a></li>
                <hr />
            </ul>
            <ul>
            	<h3>Content</h3>
            	<li><a href="post.php">Posts</a></li>
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
        	<h2>Control Panel</h2>
            <p>Here you can modify and change your website.</p>
            <div id="widget">
            	<div id="widget_title"><h3>Quick Shortcuts</h3></div>
            	<div id="widget_body">
                	<div id='shortcut'>
                    <img src='icon/Word-Processor.png' width='150' height='150' />
                    <a href='/admin/post.php' class='button'>Write a post</a>
                    </div>
                    <div id='shortcut'>
                    <img src='icon/Wrench.png' width='150' height='150' />
                    <a href='/admin/setting.php' class='button'>Change settings</a>
                    </div>
                    <div id='shortcut'>
                    <img src='icon/Slideshow.png' width='150' height='150' />
                    <a href='/admin/media.php' class='button'>Upload Media</a>
                    </div>
                    <div id='shortcut'>
                    <img src='icon/Graphing-Spreadsheets.png' width='150' height='150' />
                    <a href='/admin/stats.php' class='button'>View Statistics</a>
                    </div>
        			<div id="clear"></div>
                </div>
            </div>
            <br />
            <div style="width:902px;">
            <div id="third_widget" style="height:215px;">
            	<div id="widget_title"><h3>Server Info</h3></div>
            	<div id="widget_body">
                	<div id="widget_text">
                	<?php
						$serversign=$_SERVER['SERVER_SIGNATURE'];
						$admin=$_SERVER['SERVER_ADMIN'];
						$address=$_SERVER['SERVER_ADDR'];
						$port=$_SERVER['SERVER_PORT'];
						$root=$_SERVER['SystemRoot'];
						$name=$_SERVER['SERVER_NAME'];
						echo "<p>$serversign</p>";
						echo "<p>Server Name: $name</p>";
						echo "<p>Admin Email: $admin</p>";
						echo "<p>Server Address: $address</p>";
					?>
                    </div>
                </div>
            </div>
            <div id="third_widget" style="float:right; height:215px;">
            	<div id="widget_title"><h3>Recent Comments</h3></div>
            	<div id="widget_body">
                    <table style="margin:15px;" width="410">
                        <tr>
                            <td>Comment Data</td>
                            <td>Action</td>
                        </tr>
                        <tr>
                            <td>This is a comment blah blah blah...</td>
                            <td>
                            	<a href=""><img src="icon/eye.png" height="14" style="margin-right:5px;"/></a>
                            </td>
                        </tr>
                        <tr>
                            <td>This is a comment blah blah blah...</td>
                            <td>
                            	<a href=""><img src="icon/eye.png" height="14" style="margin-right:5px;"/></a>
                            </td>
                        </tr>
                        <tr>
                            <td>This is a comment blah blah blah...</td>
                            <td>
                            	<a href=""><img src="icon/eye.png" height="14" style="margin-right:5px;"/></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            </div>
        <div id="clear"></div>
        </div>
        <div id="clear"></div>
    </body>
</html>