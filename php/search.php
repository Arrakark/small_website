<?php
$search=mysql_real_escape_string($_GET['s']);
	echo "<h2>Search Results:</h2>
	<div id='microtext'>Refine your search by using less keywords.</div>
	<p>Here are the search results for '$search'</p>
	<hr />";
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result1=mysql_query("SELECT * 
FROM  `sw`.`sw_post` 
WHERE  `post_title` LIKE  '%$search%'
OR  `post_data` LIKE  '%$search%'
AND  `post_status` =1");
if (!$result1)
{
}
else
{
	$num1=mysql_num_rows($result1);	
	$i1=0;
	while ($num1 > $i1)
	{
		$post_id=mysql_result($result1,$i1,"post_id");
		$post_title=mysql_result($result1,$i1,"post_title");
		$post_data=substr(strip_tags(mysql_result($result1,$i1,"post_data")),0,160);
		$post_timeadd=mysql_result($result1,$i1,"post_timeadd");
		$result2=mysql_query("SELECT * 
		FROM  `sw`.`sw_setting` 
		WHERE  `setting_name` LIKE  'website_title'
		LIMIT 0 , 30");
		if (!$result2)
		{
			$result2=mysql_query("INSERT INTO  `sw`.`sw_setting` (
			`setting_id` ,
			`setting_name` ,
			`setting_data`
			)
			VALUES (
			NULL ,  'website_title',  'Website Title'
			);");
		}
		else
		{
			$num2=mysql_num_rows($result2);	
			$i2=0;
			while ($num2 > $i2)
			{
				$setting_data=mysql_result($result2,$i2,"setting_data");
				echo "<title>$setting_data - Search Results for $search</title>";
				$i2++;
			}
		}
		echo "<h2><a href='/?pt=$post_id'>$post_title</a></h2>";
		echo "<div id='microtext'>Posted: $post_timeadd</div>";
		echo "<p>$post_data...<p><hr />";
		$i1++;
	}
}
?>
<?php
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result1=mysql_query("SELECT * 
FROM  `sw`.`sw_page` 
WHERE  `page_title` LIKE  '%$search%'
OR  `page_data` LIKE  '%$search%'
AND  `page_status` =1");
if (!$result1)
{
}
else
{
	$num1=mysql_num_rows($result1);	
	$i1=0;
	while ($num1 > $i1)
	{
		$page_id=mysql_result($result1,$i1,"page_id");
		$page_title=mysql_result($result1,$i1,"page_title");
		$page_data=substr(strip_tags(mysql_result($result1,$i1,"page_data")),0,160);
		$page_timeadd=mysql_result($result1,$i1,"page_timeadd");
		$result2=mysql_query("SELECT * 
		FROM  `sw`.`sw_setting` 
		WHERE  `setting_name` LIKE  'website_title'
		LIMIT 0 , 30");
		if (!$result2)
		{
			$result2=mysql_query("INSERT INTO  `sw`.`sw_setting` (
			`setting_id` ,
			`setting_name` ,
			`setting_data`
			)
			VALUES (
			NULL ,  'website_title',  'Website Title'
			);");
		}
		else
		{
			$num2=mysql_num_rows($result2);	
			$i2=0;
			while ($num2 > $i2)
			{
				$setting_data=mysql_result($result2,$i2,"setting_data");
				echo "<title>$setting_data - Search Results for $search</title>";
				$i2++;
			}
		}
		echo "<h2><a href='/?pg=$page_id'>$page_title</a></h2>";
		echo "<div id='microtext'>Created: $page_timeadd</div>";
		echo "<p>$page_data...<p><hr />";
		$i1++;
	}
}
?>
<?php
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result1=mysql_query("SELECT * 
FROM  `sw`.`sw_cat` 
WHERE  `cat_title` LIKE  '%$search%'
OR  `cat_data` LIKE  '%$search%'
AND  `cat_status` =1");
if (!$result1)
{
}
else
{
	$num1=mysql_num_rows($result1);	
	$i1=0;
	while ($num1 > $i1)
	{
		$cat_id=mysql_result($result1,$i1,"cat_id");
		$cat_title=mysql_result($result1,$i1,"cat_title");
		$cat_data=substr(strip_tags(mysql_result($result1,$i1,"cat_data")),0,160);
		$cat_timeadd=mysql_result($result1,$i1,"cat_timeadd");
		$result2=mysql_query("SELECT * 
		FROM  `sw`.`sw_setting` 
		WHERE  `setting_name` LIKE  'website_title'
		LIMIT 0 , 30");
		if (!$result2)
		{
			$result2=mysql_query("INSERT INTO  `sw`.`sw_setting` (
			`setting_id` ,
			`setting_name` ,
			`setting_data`
			)
			VALUES (
			NULL ,  'website_title',  'Website Title'
			);");
		}
		else
		{
			$num2=mysql_num_rows($result2);	
			$i2=0;
			while ($num2 > $i2)
			{
				$setting_data=mysql_result($result2,$i2,"setting_data");
				echo "<title>$setting_data - Search Results for $search</title>";
				$i2++;
			}
		}
		echo "<h2><a href='/?cat=$cat_id'>$cat_title</a></h2>";
		echo "<div id='microtext'>Created: $cat_timeadd</div>";
		echo "<p>$cat_data...<p><hr />";
		$i1++;
	}
}
?>
<?php
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result1=mysql_query("SELECT * 
FROM  `sw`.`sw_media` 
WHERE  `media_title` LIKE  '%$search%'
OR  `media_data` LIKE  '%$search%'
OR  `media_image_data` LIKE  '%$search%'
OR  `media_video_data` LIKE  '%$search%'
AND  `media_status` =1");
if (!$result1)
{
}
else
{
	$num1=mysql_num_rows($result1);	
	$i1=0;
	while ($num1 > $i1)
	{
		$media_id=mysql_result($result1,$i1,"media_id");
		$media_title=mysql_result($result1,$i1,"media_title");
		$media_data=substr(strip_tags(mysql_result($result1,$i1,"media_data")),0,160);
		$media_timeadd=mysql_result($result1,$i1,"media_timeadd");
		$result2=mysql_query("SELECT * 
		FROM  `sw`.`sw_setting` 
		WHERE  `setting_name` LIKE  'website_title'
		LIMIT 0 , 30");
		if (!$result2)
		{
			$result2=mysql_query("INSERT INTO  `sw`.`sw_setting` (
			`setting_id` ,
			`setting_name` ,
			`setting_data`
			)
			VALUES (
			NULL ,  'website_title',  'Website Title'
			);");
		}
		else
		{
			$num2=mysql_num_rows($result2);	
			$i2=0;
			while ($num2 > $i2)
			{
				$setting_data=mysql_result($result2,$i2,"setting_data");
				echo "<title>$setting_data - Search Results for $search</title>";
				$i2++;
			}
		}
		echo "<h2><a href='/?md=$media_id'>$media_title</a></h2>";
		echo "<div id='microtext'>Created: $media_timeadd</div>";
		echo "<p>$media_data...<p><hr />";
		$i1++;
	}
}
?>
<?php
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result1=mysql_query("SELECT * 
FROM  `sw`.`sw_user` 
WHERE  `user_title` LIKE  '%$search%'
OR  `user_data` LIKE  '%$search%'
OR  `user_name` LIKE  '%$search%'
AND  `user_status` =1");
if (!$result1)
{
}
else
{
	$num1=mysql_num_rows($result1);	
	$i1=0;
	while ($num1 > $i1)
	{
		$user_id=mysql_result($result1,$i1,"user_id");
		$user_title=mysql_result($result1,$i1,"user_title");
		$user_data=substr(strip_tags(mysql_result($result1,$i1,"user_data")),0,160);
		$user_name=mysql_result($result1,$i1,"user_name");
		$result2=mysql_query("SELECT * 
		FROM  `sw`.`sw_setting` 
		WHERE  `setting_name` LIKE  'website_title'
		LIMIT 0 , 30");
		if (!$result2)
		{
			$result2=mysql_query("INSERT INTO  `sw`.`sw_setting` (
			`setting_id` ,
			`setting_name` ,
			`setting_data`
			)
			VALUES (
			NULL ,  'website_title',  'Website Title'
			);");
		}
		else
		{
			$num2=mysql_num_rows($result2);	
			$i2=0;
			while ($num2 > $i2)
			{
				$setting_data=mysql_result($result2,$i2,"setting_data");
				echo "<title>$setting_data - Search Results for $search</title>";
				$i2++;
			}
		}
		echo "<h2><a href='/?us=$user_id'>$user_title</a></h2>";
		echo "<div id='microtext'>Username: $user_name</div>";
		echo "<p>$user_data...<p><hr />";
		$i1++;
	}
}
echo "<p><a href='/'>Home</a></p>";
?>