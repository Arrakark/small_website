<?php
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else 
{
	$result1=mysql_query("SELECT * 
	FROM `sw`.`sw_featured_img` 
	LIMIT 0 , 30");
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
			$img_title=mysql_result($result1,$i1,"img_title");
			$img_text=mysql_result($result1,$i1,"img_text");
			$link_text=mysql_result($result1,$i1,"link_text");
			$link=mysql_result($result1,$i1,"link");
			$result1=mysql_query("SELECT * 
			FROM `sw`.`sw_media` 
			WHERE `media_id`=$media_id
			LIMIT 0 , 1");
			$num1=mysql_num_rows($result1);	
			$i1=0;
			while ($num1 > $i1)
			{
				$result2=mysql_query("SELECT * 
				FROM  `sw`.`sw_setting` 
				WHERE  `setting_name` =  'img_height'
				LIMIT 0 , 30");
				$num2=mysql_num_rows($result2);	
				$i2=0;
				while ($num2 > $i2)
				{
					$setting_data=mysql_result($result2,$i2,"setting_data")."px";
					$media_image_data=mysql_result($result1,$i1,"media_image_data");
					echo 
					"<div id='featured_img' style='background-image: url($media_image_data); height:$setting_data;'></div>
					<div id='img_info'>
					<h1>$img_title</h1>
					<p style='float:left; width:754px;'>$img_text</p>
					<a href='$link' class='button'>$link_text</a>
							<div id='clear'></div>
					</div>
					
					";	
					$i2++;
				}
					$i1++;
			}
			
			$i1++;
		}
	}
}
mysql_close($con);
?>