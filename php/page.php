<?php
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else 
{
	$page_id=$_GET['pg'];
	$result1=mysql_query("SELECT * 
	FROM  `$db`.`sw_page` 
	WHERE  `page_status` =1
	AND `page_id` =$page_id
	LIMIT 0, 1");
	if (!$result1)
	{
		echo "<h2>No Page!</h2>";
	}
	else
	{
		$num1=mysql_num_rows($result1);	
		$i1=0;
		while ($num1 > $i1)
		{
			$page_id=mysql_result($result1,$i1,"page_id");
			$page_title=mysql_result($result1,$i1,"page_title");
			$page_data=mysql_result($result1,$i1,"page_data");
			$page_timeadd=mysql_result($result1,$i1,"page_timeadd");
			echo "<style>#page_content { width:100%; }</style>";
			echo "<h2>$page_title</h2>";
			echo "<div id='microtext'>Posted: $page_timeadd</div>";
			echo "$page_data";
			echo "<hr />";
			echo "<p><a href='/'>Home</a></p>";
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
					echo "<title>$setting_data | $page_title</title>";
					$i1++;
				}
			}
			$i1++;
		}
	}
}
mysql_close($con);
?>