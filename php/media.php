<?php
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else 
{
	$media_id=$_GET['md'];
	$result1=mysql_query("SELECT * 
	FROM  `$db`.`sw_media` 
	WHERE  `media_status` =1
	AND `media_id` =$media_id
	LIMIT 0, 1");
	if (!$result1)
	{
		echo "<h2>No Media!</h2>";
	}
	else
	{
		$num1=mysql_num_rows($result1);	
		$i1=0;
		while ($num1 > $i1)
		{
			
			$media_id=mysql_result($result1,$i1,"media_id");
			$media_title=mysql_result($result1,$i1,"media_title");
			$media_image_data=mysql_result($result1,$i1,"media_image_data");
			$media_video_data=mysql_result($result1,$i1,"media_video_data");
			$media_data=mysql_result($result1,$i1,"media_data");
			$media_timeadd=mysql_result($result1,$i1,"media_timeadd");
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
					echo "<title>$setting_data | $media_title</title>";
					$i1++;
				}
			}
			echo "<style>#page_content { width:100%; }</style>";
			echo "<h2>$media_title</h2>";
			echo "<div id='microtext'>Posted: $media_timeadd</div>";
			if (!empty($media_image_data)) {
				echo "<img src='$media_image_data' style='width:calc(100%-8px);'></img>";
			}
			if (!empty($media_video_data)) {
				echo "<p>$media_video_data</p>";
			}
			echo "<p>$media_data</p>";
			echo "<hr />";
			echo "<p><a href='/'>Home</a></p>";
			$i1++;
		}
	}
}
mysql_close($con);
?>