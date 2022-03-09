<?php
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else 
{
	$postnumber=$_GET['pag']*5;
	$cat_id=$_GET['cat'];
	$result1=mysql_query("SELECT * 
	FROM  `$db`.`sw_cat` 
	WHERE  `cat_status` =1
	AND `cat_id` =$cat_id");
	if (!$result1)
	{
		echo "<h2>No Categories!</h2>";
	}
	else
	{
		$num1=mysql_num_rows($result1);	
		$i1=0;
		while ($num1 > $i1)
		{
			$cat_id=mysql_result($result1,$i1,"cat_id");
			$cat_title=mysql_result($result1,$i1,"cat_title");
			$cat_data=mysql_result($result1,$i1,"cat_data");
			$cat_timeadd=mysql_result($result1,$i1,"cat_timeadd");
			echo "<h2>$cat_title</h2>";
			echo "<div id='microtext'>Created: $cat_timeadd</div>";
			echo "<p>$cat_data</p><hr />";
			$result1=mysql_query("SELECT * 
			FROM  `sw`.`sw_setting` 
			WHERE  `setting_name` LIKE  'website_title'
			LIMIT 0 , 30");
			if (!$result1)
			{
				$result1=mysql_query("INSERT INTO  `sw`.`sw_setting` (
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
				$num1=mysql_num_rows($result1);	
				$i1=0;
				while ($num1 > $i1)
				{
					$setting_data=mysql_result($result1,$i1,"setting_data");
					echo "<title>$setting_data | $cat_title</title>";
					$i1++;
				}
			}
			$result1=mysql_query("SELECT * 
			FROM  `$db`.`sw_post` 
			WHERE  `post_status` =1
			AND `post_cat_id` =$cat_id
			LIMIT $postnumber, 5");
			if (!$result1)
			{
				echo "<h2>No posts!</h2>";
			}
			else
			{
				$num1=mysql_num_rows($result1);	
				if (!$num1)
				{
					echo "<h2>No posts!</h2>";
				}
				$i1=0;
				while ($num1 > $i1)
				{
					$post_id=mysql_result($result1,$i1,"post_id");
					$post_title=mysql_result($result1,$i1,"post_title");
					$post_data=mysql_result($result1,$i1,"post_data");
					$post_timeadd=mysql_result($result1,$i1,"post_timeadd");
					
					echo "<a href='/?pt=$post_id' style='text-decoration:none;'><h2>$post_title</h2></a>";
					echo "<div id='microtext'>Created: $post_timeadd</div>";
					echo "<p>$post_data</p><hr />";
					$i1++;
				}
			}
			$i1++;
			$result2=mysql_query("SELECT * 
			FROM  `$db`.`sw_post` 
			WHERE  `post_status` =1
			AND `post_cat_id` =$cat_id");
			$num2=mysql_num_rows($result2);
			if ($num2) {
				$page=ceil($num2/5);
				$pagei1=0;
				echo "<p>Page: ";
				while ($page > $pagei1)
				{
					echo "<a href='/?cat=$cat_id&pag=$pagei1' class='pagelink'>$pagei1</a> ";
					$pagei1++;	
				}
			}
		}
	}
}
mysql_close($con);
?>