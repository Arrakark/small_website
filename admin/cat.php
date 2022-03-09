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
        <title>Category Manager</title>
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
            	<li><a href="page.php">Pages</a></li>
                <hr />
                <li id="select"><a href="cat.php">Category</a><div id="selecttri"></div></li>
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
        	<h2>Categories</h2>
            <p>Edit and move posts within categories.</p>
            <div id="widget">
            	<div id="widget_title"><h3>New Category</h3></div>
            	<div id="widget_body">
                	<form>
                        <table style="margin:15px;" width="870">
                            <tr>
                                <td width="157">Name</td>
                                <td>Description</td>
                                <td width="24">Draft</td>
                                <td width="35">Navbar</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="title" /></td>
                                <td><input type="text" name="data" style="width:580px;"/></td>
                                <td width="24"><center><input type="checkbox" name="draft" style="margin:0;"/></center></td>
                                <td width="35"><center><input type="checkbox" name="navbar" style="margin:0;"/></center></td>
                            </tr>
                            <tr>
                                <td colspan="4"><input type="submit" style="float:right;"/></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <br />
        </div>
        <div id="clear"></div>
    </body>
</html>